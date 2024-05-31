<?php
require_once('tcpdf.php');

// Create new PDF instance
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetTitle("Exportation des leçons");

// Add a page
$pdf->AddPage();

// Read lessons data from lessons.txt file
$filePath = "lessons.txt";
if (file_exists($filePath)) {
    $pdf->SetFont('helvetica', '', 10);

    $lessonsContent = file_get_contents($filePath);
    $lessonsArray = explode("\n\n", $lessonsContent);

    // Calculate column widths based on page width
    $pageWidth = $pdf->getPageWidth() - $pdf->getMargins()['left'] - $pdf->getMargins()['right'];
    $col1Width = 0.15 * $pageWidth;
    $col2Width = 0.5 * $pageWidth;
    $col3Width = 0.35 * $pageWidth;

    // Set uniform cell height
    $cellHeight = 20;

    // Add column titles
    $pdf->SetFont('helvetica', 'B', 12);
    $pdf->Cell($col1Width, $cellHeight, 'Date', 1);
    $pdf->Cell($col2Width, $cellHeight, 'Titre, Sous-titre, Exercice, Activité', 1);
    $pdf->Cell($col3Width, $cellHeight, 'Observation', 1);
    $pdf->Ln();

    foreach ($lessonsArray as $lessonData) {
        $lessonData = trim($lessonData);
        if (!empty($lessonData)) {
            $lines = explode("\n", $lessonData);

            // Column 1: Date
            $date = isset($lines[0]) ? htmlspecialchars($lines[0]) : '';

            // Column 2: Lesson Content (including Titre, Sous-titre, Exercice, Activité)
            $lessonContent = '';
            $col2Height = 0; // Initialize the height of Column 2
            for ($i = 1; $i <= 4; $i++) {
                $content = isset($lines[$i]) ? htmlspecialchars($lines[$i]) . "\n" : '';
                $lessonContent .= $content;

                // Calculate the height of Column 2 based on the content
                $col2Height += $pdf->getStringHeight($col2Width, $content);
            }

            // Column 3: Observation
            $observation = isset($lines[5]) ? htmlspecialchars($lines[5]) : '';

            // Calculate the height needed for Column 3 (Observation)
            $obsHeight = $pdf->getStringHeight($col3Width, $observation);

            // Calculate the maximum height of the row (use Column 2's height)
            $rowHeight = max($cellHeight, $col2Height, $obsHeight);

            // Table row with enhanced styles
            $pdf->SetFont('helvetica', '', 10);
            $pdf->Cell($col1Width, $rowHeight, $date, 1);
            $pdf->MultiCell($col2Width, $rowHeight, $lessonContent, 1, 'L', false, 0, '', '', true);
            $pdf->MultiCell($col3Width, $rowHeight, $observation, 1, 'L', false, 0, '', '', true);
            $pdf->Ln(); // Move to the next row
        }
    }

    // Close and output PDF document
    $pdf->Output('export_lessons.pdf', 'I');
}
?>
