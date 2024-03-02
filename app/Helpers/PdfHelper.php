
namespace App\Helpers;
use Dompdf\Dompdf;
use Dompdf\Options;

class PdfHelper
{
    public static function generatePayrollPDF($data)
    {
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);

        $dompdf = new Dompdf($options);

        $html = view('pdf/payroll', $data); // Assuming you have a view file for the PDF in app/Views/pdf/payroll.php

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        $output = $dompdf->output();

        file_put_contents('payroll.pdf', $output); // Save the PDF file (you may want to customize the filename and path)

        return 'payroll.pdf';
    }
}
