<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//libraries
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

//models
use App\Models\NewslettersModel;

class NewsletterController extends Controller {
    
    public function list(Request $request) {

        $title = 'Newsletters | List | Twist Administration';

        $filterBySource = false;

        if ($request->has('source') && $request->input('source') != '') {
        	$filterBySource = $request->input('source');
        }

        $totalNewsletters = NewslettersModel::count();

        $newsletters = NewslettersModel::when($filterBySource, function($query, $filterBySource) {
        	return $query->where('email', 'LIKE', '%'.$filterBySource.'%');
        })->orderBy('newsletter_id')->paginate(50);

        $filtersParameters = [
            'source' => $filterBySource
        ];

        $scripts = array('newsletters.js');

        return view('backend.newsletters.list', compact('title', 'totalNewsletters', 'newsletters', 'filtersParameters', 'scripts'));
    }

    public function deleteNewsletter($newsletterId) {

    	$newsletterData = NewslettersModel::where('newsletter_id', $newsletterId)->first();

    	if (!$newsletterData) {
    		return response()->json(['success' => false, 'message' => 'Invalid newsletter ID']);
    	}

    	NewslettersModel::where('newsletter_id', $newsletterId)->delete();

    	return response()->json(['success' => true, 'message' => 'Newsletter deleted successfully']);
    }

    public function exportNewsletterList(Request $request) {
        $filename = 'Newsletters.xlsx';

        $newsletters = NewslettersModel::orderBy('newsletter_id', 'desc')->get();

        $spreadsheet = new Spreadsheet();
        $Excel_writer = new Xlsx($spreadsheet);
         
        $activeSheet = $spreadsheet->getActiveSheet();
        
        $activeSheet->setCellValue('A1', 'Registration date'); 
        $activeSheet->setCellValue('B1', 'Email'); 

        $i = 2;
        foreach ($newsletters as $newsletter) {
            
            $activeSheet->setCellValue('A' . $i, $newsletter->registration_date);
            $activeSheet->setCellValue('B' . $i, $newsletter->email);

            $activeSheet->getColumnDimension('A')->setWidth(50);
            $activeSheet->getColumnDimension('B')->setWidth(50);

            $i++;
        }

        $activeSheet->getStyle('A1:B1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('F7941D');
         
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename=' . $filename);
        header('Cache-Control: max-age=0');
        ob_start();
        $Excel_writer->save('php://output');

        $xlsData = ob_get_contents();
        ob_end_clean();

        $response =  array(
            'success' => true,
            'file' => "data:application/vnd.ms-excel;base64," . base64_encode($xlsData),
            'filename' => $filename
        );

        echo json_encode($response);
    }
}