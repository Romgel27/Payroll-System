<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Models\PayrollModel;
use App\Models\SalesRepModel;

class mainController extends Controller
{
    public function dashboard()
    {
        //helper(['form']);
        //echo view('dashboard/payroll/add');
        $SalesRepModel = new SalesRepModel();
        $data['sales_representatives'] = $SalesRepModel->findAll();
        return view('dashboard/payroll/add',$data);
    }    
    
    public function SalesRepList() //Sales Representatives List
    {
        //helper(['form']);
        //echo view('dashboard/SalesRep/add');
        $fetchSalesRep = new SalesRepModel();
        $data['sales_representatives'] = $fetchSalesRep->findAll();
        return view('dashboard/SalesRep/list', $data);
    }


    public function CreateSalesRep() // Input Sales Representative Information
    {
        $data['sales_representatives'] = '2024_' . uniqid();
        return view('dashboard/SalesRep/list', $data);
    }
    
    

    public function AddSalesRep() //Store information Sales Representatives
    {
        $insertSalesInfo = new SalesRepModel();

        $data = array (
            'name'=> $this->request->getPost('Name'),
            'commission_percentage'=> $this->request->getPost('commission'),
            'tax_rate'=> $this->request->getPost('taxrate')
        );
        $insertSalesInfo->insert($data);
        return redirect('dashboard/SalesRep/list')->with('success', 'Information Added Successfully');
    }

    public function editSalesRep($id) //edit sales representatives information: name, commission, & tax
    {
        $fetchSalesRep = new SalesRepModel();
        $data['sales_representatives'] = $fetchSalesRep->where('id', $id)->first();
    
        // Pass the data to the view
        return view('dashboard/SalesRep/list', $data);
    }


    public function UpdateSalesRep($id) // update the sales Representativ information
    {
        $updateSalesRep = new SalesRepModel();
        $data = array(
            'name'=>$this->request->getPost('Name'),
            'commission_percentage'=>$this->request->getPost('commission'),
            'tax_rate'=>$this->request->getPost('taxrate'),
            'bonuses'=>$this->request->getPost('bonus')
        );
        $updateSalesRep->update($id, $data);
        return redirect('dashboard/SalesRep/list')->with('success', 'Information Updated Successfully');

    }

    public function DeleteSalesRep($id) // Delete Sales Representative Information
    {
        $deleteSalesRep = new SalesRepModel ();
        $deleteSalesRep->delete($id);
        return redirect('dashboard/SalesRep/list')->with('success', 'Information Deleted Successfully');
    }

    public function handlePayrollForm()
    {
        $formData = $this->request->getPost();
    
        // Retrieve form input
        $commission = $formData['commission'];
        $taxRate = $formData['taxRate'];
        $multiplier = $formData['multiplier'];
        $paymentAmount = $formData['paymentAmount'];
    
        // Perform calculations
        $netAmount = ($commission * $paymentAmount * (1 - $taxRate / 100));
        $tax = $netAmount * ($taxRate / 100);
        $totalAmount = $netAmount - $tax;
    
        // Pass results to the view
        $data = [
            'netAmount' => $netAmount,
            'tax' => $tax,
            'totalAmount' => $totalAmount,
        ];
    
        // Return the results as JSON
        return $this->response->setJSON($data);
    }
    
    public function generatePdf()
    {
        $formData = $this->request->getJSON(true);
    
        // Retrieve form input
        $commission = $formData['commission'];
        $taxRate = $formData['taxRate'];
        $multiplier = $formData['multiplier'];
        $paymentAmount = $formData['paymentAmount'];
    
        // Perform calculations
        $netAmount = ($commission * $paymentAmount * (1 - $taxRate / 100));
        $tax = $netAmount * ($taxRate / 100);
        $totalAmount = $netAmount - $tax;
    
        // Generate the PDF
        $pdf = new \TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    
        // Set document information
        $pdf->SetCreator('My Application');
        $pdf->SetAuthor('My Name');
        $pdf->SetTitle('Payroll');
        $pdf->SetSubject('Payroll Report');
        $pdf->SetKeywords('Payroll, Report');
    
        // Set header and footer
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
        $pdf->setFooterData(array(0, 64, 0), array(0, 64, 128));
    
        // Set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
    
        // Set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    
        // Set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    
        // Set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
    
        // Set some language-dependent strings (optional)
        if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
            require_once(dirname(__FILE__) . '/lang/eng.php');
            $pdf->setLanguageArray($l);
        }
    
        // Add a page
        $pdf->AddPage();
    
        // Set font
        $pdf->SetFont('helvetica', 'B', 16);
    
        // Write some text
        $pdf->Cell(0, 10, 'Payroll Report', 0, 1, 'C');

        // Add calculated results to the PDF
        $pdf->SetFont('helvetica', 'B', 12);
        $pdf->Cell(0, 10, 'Net Amount: $' . number_format($netAmount, 2), 0, 1);
        $pdf->Cell(0, 10, 'Tax: $' . number_format($tax, 2), 0, 1);
        $pdf->Cell(0, 10, 'Total Amount: $' . number_format($totalAmount, 2), 0, 1);

        // Output the PDF to a file (you may want to save or download it)
        $pdfFilename = WRITEPATH . 'pdf/payroll_report.pdf';
        $pdf->Output($pdfFilename, 'F');

        // Return the PDF filename
        return $pdfFilename;
    }


    public function viewPdf()
{
    // Get the PDF filename from the URL or any other source
    $pdfFilename = WRITEPATH . 'public/Sample';

    // Check if the file exists
    if (!file_exists($pdfFilename)) {
        // You may want to handle the case when the file doesn't exist
        return "PDF file not found";
    }

    // Load the file helper
    helper('file');

    // Read the file content
    $pdfContent = read_file($pdfFilename);

    // Set the content type
    $this->response->setContentType('application/pdf');

    // Output the PDF content
    return $this->response->setBody($pdfContent);
}

}
    

    /*public function generatePdf() {
        $netAmount = $this->request->getPost('netAmount');
        $tax = $this->request->getPost('tax');
        $totalAmount = $this->request->getPost('totalAmount');
    
        $pdfData = [
            'netAmount' => $netAmount,
            'tax' => $tax,
            'totalAmount' => $totalAmount,
        ];
    
        $pdfFilename = PdfHelper::generatePayrollPDF($pdfData);
    
        return $this->response->download($pdfFilename, null);
    }*/

// Your existing controller method

/*public function handlePayrollForm()
{

    $netAmount = ($commission * $paymentAmount * (1 - $taxRate / 100));
    $tax = $netAmount * ($taxRate / 100);
    $totalAmount = $netAmount - $tax;

    // Pass results to the view
    $data = [
        'netAmount' => $netAmount,
        'tax' => $tax,
        'totalAmount' => $totalAmount,
    ];

    // Generate PDF
    $pdfFilename = PdfHelper::generatePayrollPDF($data);

    // You can return a view or redirect to another page as needed

    // For example, redirect to a page displaying a link to download the PDF
    return redirect()->to(base_url('pdf/download/' . $pdfFilename));*/











