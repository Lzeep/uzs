<?php

namespace App\Http\Controllers;

use FontLib\Table\Type\name;
use Illuminate\Http\Request;
use DB;
use App\Subject;
use Barryvdh\DomPDF\PDF;

class DynamicPDFController extends Controller
{
    function index()
    {
        $subject_data = $this->get_subject_data();
        return view('subject.index')->with('subject_data', $subject_data);
    }
    function get_subject_data()
    {
        $subject_data = DB::table('subjects')->limit(10)->get();
        return $subject_data;
    }

    function PDF()
    {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convert_subject_data_to_html());
        $pdf->stream();
    }

    function convert_subject_data_to_html()
    {
        $subject_data = $this->get_subject_data();
        $output = '
        <h3 align = "center">Object Data</h3>
        <table width="100%" style="border-collapse: collapse; border: 0px">
        <tr>
        <th style="border: 1px solid; padding:12px;" width="20%">ID</th>
        <th style="border: 1px solid; padding:12px" width="15%">Address</th>
        <th style="border: 1px solid; padding:12px" width="15%">Name</th>
        <th style="border: 1px solid; padding:12px" width="15%">Owner</th>
        <th style="border: 1px solid; padding:12px" width="15%">Status</th>
        <th style="border: 1px solid; padding:12px" width="15%">Violation</th>
        <th style="border: 1px solid; padding:12px" width="15%">Result</th>
        <th style="border: 1px solid; padding:12px" width="15%">Document</th>
        <th style="border: 1px solid; padding:12px" width="15%">Employee</th>
</tr>

        ';
        foreach($subject_data as $subject)
        {
            $output .= '
<tr>
   <td style="border: 1px solid; padding: 12px;">'.$subject->address.'</td>
   <td style="border: 1px solid; padding: 12px;">'.$subject->name.'</td>
   <td style="border: 1px solid; padding: 12px;">'.$subject->owner.'</td>
   <td style="border: 1px solid; padding: 12px;">'.$subject->status_id.'</td>
   <td style="border: 1px solid; padding: 12px;">'.$subject->violation_id.'</td>
   <td style="border: 1px solid; padding: 12px;">'.$subject->result_id.'</td>
   <td style="border: 1px solid; padding: 12px;">'.$subject->document.'</td>
   <td style="border: 1px solid; padding: 12px;">'.$subject->employee_id.'</td>
   </tr>
            ';
        }
        $output .= '</table>';
        return $output;
    }


}
