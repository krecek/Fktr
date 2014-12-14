<?php

class ZalohaPresenter extends BasePresenter {
    public function actionDefault()
    {
        echo exec("whereis mysqldump"); 
    }
    
    public function actionExport($format='xls', $typ='all')
    {
        
    }
    
    public function actionExportSql()
    {
        
    }
    public function exportXls($data)
    {
        
    }
            
}
