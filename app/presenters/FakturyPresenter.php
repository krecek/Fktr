<?php

class FakturyPresenter extends BasePresenter {

    private $id;
    private $filtr;
    private $faktura;
    private $id_odberatele;
    public $mainItem = 'faktury';

    public function beforeRender() {
        parent::beforeRender();
        $dnes = new Nette\DateTime();
        $dnes->setDate(date('Y'), date('m'), date('d'));
        $dnes->setTime(0, 0, 0);
        $this->template->dnes = $dnes;
    }

    public function actionDefault($rok = null, $odberatel = null, $zaplaceno = null) {
        if (!$rok)
            $rok = date('Y');
        if ($odberatel)
            $this->filtr['odberatel'] = $odberatel;
        if ($zaplaceno)
            $this->filtr['zaplaceno'] = $zaplaceno;
        $this->filtr['rok'] = $rok;
        $faktury = $this->fakturyRepository->vyhledatFaktury($this->filtr);
        $this->template->faktury = $faktury;
    }

    protected function createComponentFakturyFiltrForm() {
        $roky = $this->fakturyRepository->getRoky();
        $form = new FiltrFakturyForm($roky, $this->filtr);
        $form->onSuccess[] = callback($this, 'fakturyFiltrFormSubmitted');
        return $form;
    }

    public function fakturyFiltrFormSubmitted($form) {
        $values = $form->getValues();
        $r = '';
        if ($values->rok)
            $r['rok'] = $values->rok;
        if ($values->zaplaceno)
            $r['zaplaceno'] = $values->zaplaceno;
        if ($values->odberatel)
            $r['odberatel'] = $values->odberatel;
        $this->redirect('default', $r);
    }

    public function actionNew($id) {
        $this->id_odberatele = $id;
        $this->template->pocetPolozek = $this->konfigurace->pocetPolozek;
    }

    protected function createComponentNovaFakturaForm() {
        $form = new UpravitFakturuForm($this->konfigurace->dph, $this->konfigurace->cislo_faktury);
        $form->onSuccess[] = callback($this, 'novaFakturaFormSubmitted');
        return $form;
    }

    public function novaFakturaFormSubmitted(UpravitFakturuForm $form) {
        $values = $form->getValues();
        $faktura = new Faktura();
        $values['odberatel'] = $this->id_odberatele;
        $faktura->setUdaje($values);
        $zaznam = $this->fakturyRepository->saveFaktura($faktura);
        $this->flashMessage('Faktura byla uložena');
        $this->redirect('polozky', $zaznam['id']);
    }

    public function actionPolozky($id) {
        $this->id = $id;
        $faktura = $this->fakturyRepository->vyhledatFakturu($id);
        $this->faktura = $faktura;
        $this->template->faktura = $this->faktura;
        $this->template->pocetPolozek = $this->konfigurace->pocetPolozek;
        $this->template->odberatel = $this->odberateleRepository->findById($this->faktura['odberatel']);
    }

    protected function createComponentNovePolozkyForm() {
        $form = new UpravitPolozkyForm($this->konfigurace->pocetPolozek, $this->konfigurace->dph);
        $form->onSuccess[] = callback($this, 'novePolozkyFormSubmitted');
        return $form;
    }

    public function novePolozkyFormSubmitted(UpravitPolozkyForm $form) {
        $values = $form->getValues();
        foreach ($values as $key => $hodnota) {
            if (preg_match('~polozka_(.*)~', $key, $tmp)) {
                $id = $tmp[1];
                $polozky[$id]['popis'] = $hodnota;
                $polozky[$id]['mnozstvi'] = $values['mnozstvi_' . $id];
            }
            if (preg_match('~cena_(.*)~', $key, $tmp)) {
                $id = $tmp[1];
                $polozky[$id]['cena'] = $hodnota;
                $polozky[$id]['dph'] = $values['dph_' . $id];
                $polozky[$id]['faktura'] = $values['id_faktury'];
            }
        }

        foreach ($polozky as $polozka) {
            $polozka['faktura'] = $this->id;
            $polozka_n = new Polozka;
            $polozka_n->setUdaje($polozka);
            dd($polozka_n, 'polozka_n');
            if ($polozka_n->getPopis())
                $this->polozkyRepository->savePolozka($polozka_n);
            $faktura = new Faktura($this->id);
            $this->fakturyRepository->saveFaktura($faktura);
        }
        $this->redirect('detail', $this->id);
    }

    public function actionDetail($id) {
        $this->id = $id;
        $faktura = $this->fakturyRepository->findById($this->id);
        $polozky = $this->polozkyRepository->findByFaktura($this->id);
        $cena_bez_dph = 0;
        $cena_s_dph = 0;
        foreach ($polozky as $polozka) {
            $polozka['cenabezdph'] = $polozka['cena'] * $polozka['mnozstvi'];
            $cena_bez_dph += $polozka['cenabezdph'];
            $polozka['cenasdph'] = $polozka['cenabezdph'] + ($polozka['cenabezdph'] * ($polozka['dph'] / 100));
            $cena_s_dph +=$polozka['cenasdph'];
        }
        $odberatel = $this->odberateleRepository->findById($faktura->odberatel);
        $vytisteno = TRUE;
        if ($faktura->created > $faktura->tisk || $faktura->edited > $faktura->tisk)
            $vytisteno = FALSE;
        $this->template->vytisteno = $vytisteno;
        $this->template->faktura = $faktura;
        $this->template->polozky = $polozky;
        $this->template->odberatel = $odberatel;
        $this->template->cena_bez_dph = $cena_bez_dph;
        $this->template->cena_s_dhp = $cena_s_dph;
    }

    public function actionEdit($id) {
        $this->id = $id;
        $this->faktura = $this->fakturyRepository->vyhledatFakturu($this->id);
        $this->template->faktura = $this->faktura;
        $this->template->pocetPolozek = $this->konfigurace->pocetPolozek;
    }

    protected function createComponentUpravitFakturuForm() {
        $form = new upravitFakturuForm($this->konfigurace->dph, $this->konfigurace->cislo_faktury, $this->faktura);
        $form->onSuccess[] = callback($this, 'upravitFakturuFormSubmitted');
        return $form;
    }

    public function upravitFakturuFormSubmitted(upravitFakturuForm $form) {
        $values = $form->getValues();
        $faktura = new Faktura($this->id);
        $faktura->setUdaje($values);
        $zaznam = $this->fakturyRepository->saveFaktura($faktura);
        $this->flashMessage('Faktura byla upravena');
        $this->redirect('detail', $zaznam['id']);
    }

    protected function createComponentUpravitPolozkyForm() {
        $form = new UpravitPolozkyForm($this->konfigurace->pocetPolozek, $this->konfigurace->dph, $this->faktura->polozky);
        $form->onSuccess[] = callback($this, 'upravitPolozkyFormSubmitted');
        return $form;
    }

    public function upravitPolozkyFormSubmitted(UpravitPolozkyForm $form) {
        $values = $form->getValues();
        foreach ($values as $key => $hodnota) {
            if (preg_match('~polozka_(.*)~', $key, $tmp)) {
                $id = $tmp[1];
                $polozky[$id]['text'] = $hodnota;
                $polozky[$id]['id'] = $values['id_' . $id];
                $polozky[$id]['mnozstvi'] = $values['mnozstvi_' . $id];
            }
            if (preg_match('~cena_(.*)~', $key, $tmp)) {
                $id = $tmp[1];
                $polozky[$id]['cena'] = $hodnota;
                $polozky[$id]['dph'] = $values['dph_' . $id];
                $polozky[$id]['faktura'] = $this->id;
            }
        }
        $faktura = new Faktura($this->id);
        $faktura->setPolozky($polozky);
        dd($faktura, 'faktura');
        $this->fakturyRepository->ulozitPolozky($faktura);
        $this->flashMessage('Faktura byla upravena');
        $this->redirect('detail', $this->id);
    }

    public function actionDelete($id) {
        $this->fakturyRepository->delete($id);
        $this->logg("Faktura $id vymazána");
        $this->flashMessage('Faktura vymazána');
        $this->redirect('default');
    }

    public function actionPdf($id) {
        $this->id = $id;
        $this->faktura = $this->fakturyRepository->vyhledatFakturu($this->id);
        $this->fakturyRepository->vytisknout($this->id);
        $odberatel = $this->odberateleRepository->findById($this->faktura->odberatel);
        $this->template->odberatel = $odberatel;
        $this->template->faktura = $this->faktura;
        $this->template->cislo_uctu = $this->konfigurace->cislo_uctu;
        $this->template->banka = $this->konfigurace->banka;
        $this->template->ic = $this->konfigurace->ic;
        $this->template->dic = $this->konfigurace->dic;
        $this->template->nazev = $this->konfigurace->nazev;
        $this->template->ulice = $this->konfigurace->ulice;
        $this->template->mesto = $this->konfigurace->mesto;
        $this->template->psc = $this->konfigurace->psc;
        $this->template->telefon = $this->konfigurace->telefon;
        $this->template->email = $this->konfigurace->email;
        include_once(dirname(__FILE__) . '/../../libs/mPDF/mpdf.php');
        $mpdf = new mPDF('utf-8', 'A4', 0, '', 15, 16, 20, 20, 20, 9, 'P');
//        $mpdf = new mPDF('utf-8', 'A4', 0, '', 15, 16, 75, 20, 20, 9, 'P');
        $this->template->setFile(dirname(__FILE__) . '/../templates/Faktury/pdf.latte');
        $mpdf->WriteHTML($this->template->__toString());

        $mpdf->Output($odberatel->nazev . "_" . date('Y-m-d') . ".pdf", 'I');
//	dd($this->faktura, 'faktura');
//	dd($odberatel, 'odberatel');
    }

    public function actionPrehled($id) {
        $this->filtr['odberatel'] = $id;
        $odberatel = $this->odberateleRepository->findById($id);
        $faktury = $this->fakturyRepository->vyhledatFaktury($this->filtr);
        $this->template->faktury = $faktury;
        $this->template->odberatel = $odberatel;
    }

    public function actionCopy($id) {
        $this->id = $id;
        $new_faktura = new Faktura();
        $udaje = $this->fakturyRepository->findById($id);
        $udaje['cislo'] = ($this->konfigurace->cislo_faktury + 1) . date('y');
        $udaje['datum'] = date('j.n.Y');
        $udaje['splatnost'] = date('j.n.Y', strtotime('+ 10 days'));
        $new_faktura->setUdaje($udaje);
        $zaznam = $this->fakturyRepository->saveFaktura($new_faktura);
        $polozky = $this->polozkyRepository->findByFaktura($id);
        foreach ($polozky as $polozka) {
            $new_polozka = new Polozka();
            $new_polozka->setUdaje($polozka);
            $new_polozka->setFaktura($zaznam->id);
            $this->polozkyRepository->savePolozka($new_polozka);
        }
        $this->redirect('detail', $zaznam->id);
    }

}
