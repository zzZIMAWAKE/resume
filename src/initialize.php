<?php
	require_once('../vendor/itbz/fpdf/src/fpdf/fpdf.php');
	require_once('../lib/details.php');
	
	$font     = 'Montserrat-Regular.php';
	$fontBold = 'Montserrat-Bold.php';

	class PDF extends \fpdf\FPDF
	{
		function createCell($y, $cellString, $offset = 10)
		{
			$x = $this->GetStringWidth($cellString);
			
			$this->Cell($x + 10, $y, $cellString);
		}
	
		function heading($details) {
			$name     	 = $details->getName();
			$email    	 = $details->getEmail();
			$tel      	 = $details->getTel();
			$location 	 = $details->getLocation();
			$description = $details->getDescription();
			$image		 = '../include/images/profile.jpg';

			$this->setFont('Montserrat', 'B', 12);
			$this->createCell(10, $name);
			$this->setFont('Montserrat', '', 10);
			$this->createCell(10, $email);
			$this->createCell(10, $tel);
			$this->createCell(10, $location);

			//Large description text aligned left
			$this->ln(15);
			$this->setRightMargin(80);
			$x = $this->getX();
			$y = $this->getY();
			$this->cell(100, 5, $this->write(5, $description), 0, 1, 'L');

			//Image aligned to the right
			$this->setRightMargin(5);
			$this->cell(20, 5, $this->image($image, $x + 130, $y - 3, 36, 41));
		}
		
		function skills($details)
		{
			$languages = $details->getLanguages();
			$technologies = $details->getTechnologies();

			$this->setFont('Montserrat', 'B', 14);
			$this->write(5, 'Skills: ');
			$this->ln(7);
			
			$this->setFont('Montserrat', 'B', 12);
			$this->write(5, 'Languages: ');
			$this->ln();
			$this->setFont('Montserrat', '', 10);

			$count = 0;
			foreach ($languages as $language => $time) {
				if ($count > 3) {
					$this->ln();
					$count = 0;
				}
				$this->cell(50, 5, $language . ': ' . $time);
				$count++;
			}

			$this->ln(10);
			$this->setFont('Montserrat', 'B', 12);
			$this->write(5, 'Technologies: ');
			$this->ln();
			$this->setFont('Montserrat', '', 10);

			$count = 0;
			foreach ($technologies as $technology) {
				if ($count > 3) {
					$this->ln();
					$count = 0;
				}
				$this->cell(50, 5, $technology);
				$count++;
			}
		}

		function workExperience($details)
		{
			$workExperience = $details->getWorkExperience();

			$this->setFont('Montserrat', 'B', 14);
			$this->write(5, 'Work: ');
			$this->ln(7);

			foreach ($workExperience as $employer => $data) {
				$this->setFont('Montserrat', 'B', 12);
				$this->createCell(5, $employer);
				$this->setFont('Montserrat', '', 10);
				$this->createCell(5, $data['period']);
				$this->createCell(5, $data['role']);
				$this->ln(5);
				$this->cell(0, 5, $this->write(5, $data['lineOne']));
				$this->ln(8);
				foreach ($data['bullets'] as $bulletPoint) {
					$this->cell(2, 5, chr(127), 0, 0, 'R'); 
					$this->cell($this->getX() + 2, 5, $this->write(5, $bulletPoint));
					$this->ln();
				}
				$this->ln(5);
			}
		}

		function education($details)
		{
			$education = $details->getEducation();
			$this->setFont('Montserrat', 'B', 14);
			$this->write(5, 'Education: ');
			$this->ln(7);
			$this->setFont('Montserrat', '', 10);

			foreach ($education as $type => $grade) {
				$this->createCell(5, $grade);
				$this->ln();
			}
		}

		function interests($details)
		{
			$interests = $details->getInterests();
			$this->setFont('Montserrat', 'B', 14);
			$this->write(5, 'Interests: ');
			$this->ln(7);
			$this->setFont('Montserrat', '', 10);

			$this->write(5, $interests);
		}
	}

	$pdf = new PDF();
	$pdf->AddPage();
	$pdf->AddFont('Montserrat', '', $font);
	$pdf->AddFont('Montserrat', 'B', $fontBold);
	$details = new Details();

	$pdf->heading($details);
	$pdf->ln();

	$pdf->skills($details);
	$pdf->ln(9);

	$pdf->workExperience($details);

	$pdf->education($details);
	$pdf->ln(7);

	$pdf->interests($details);
	$pdf->ln(15);

	$pdf->setFont('Montserrat', '', 8);
	$pdf->write(5, 
		'This resume was compiled using the code '
		. 'found at my GitHub: https://github.com/zzZIMAWAKE/resume/',
		'https://github.com/zzZIMAWAKE/resume/'
	);
	$content = $pdf->Output('..\resume.pdf','F');
?>