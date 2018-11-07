<?php
	@ini_set('memory_limit',-1);
	
	require(realpath(__DIR__ . '/..').'/vendor/autoload.php');
    require(realpath(__DIR__ . '/..').'/src/Database/autoload.php');
	
	use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
    use PhpOffice\PhpSpreadsheet\Cell\DataType;
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
    use PhpOffice\PhpSpreadsheet\Style\Style;
    use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
    use PhpOffice\PhpSpreadsheet\Style\Alignment;
    use PhpOffice\PhpSpreadsheet\Style\Fill;
    use PhpOffice\PhpSpreadsheet\Style\Border;
	use PhpOffice\PhpSpreadsheet\Shared\Date;
	
	use PhpOffice\PhpSpreadsheet\Chart\Chart;
	use PhpOffice\PhpSpreadsheet\Chart\DataSeries;
	use PhpOffice\PhpSpreadsheet\Chart\DataSeriesValues;
	use PhpOffice\PhpSpreadsheet\Chart\Legend;
	use PhpOffice\PhpSpreadsheet\Chart\PlotArea;
	use PhpOffice\PhpSpreadsheet\Chart\Title;
	use PhpOffice\PhpSpreadsheet\IOFactory;
	
	use Database\Database;
	
	$db = new Database($sqlDetails);
	$dati = $db->percentili->ricerca(['societa' => '01', 'dallaData' => '2018-01-01']);
	
	$elencoNegozi = $db->negozi->elenco();
	
    $nomeFile = 'percentili_'.time().'.xlsx';
    $file = realpath(__DIR__ . '/..').'/toSend/'.$nomeFile;

    // creazione del workbook 
    $workBook = new Spreadsheet();
    $workBook->getDefaultStyle()->getFont()->setName('Arial');
    $workBook->getDefaultStyle()->getFont()->setSize(10);
    $workBook->getProperties()
        ->setCreator("IF65 S.p.A. (Gruppo Italmark)")
        ->setLastModifiedBy("IF65 S.p.A.")
        ->setTitle("Report Fasce Orarie")
        ->setSubject("Report Fasce Orarie")
        ->setDescription("Report Fasce Orarie")
        ->setKeywords("office 2007 openxml php")
        ->setCategory("IF65 Docs");

	$sheet = $workBook->setActiveSheetIndex(0); // la numerazione dei worksheet parte da 0
	$sheet->setTitle('Percentili');

	$style = new Style();
	
	$primaRigaDati = 30; // attenzione le righe in Excel partono da 1
	
	// scrittura testata
	// --------------------------------------------------------------------------------	 
	$titoliColonna = ['ORA','INCASSO %','INCASSO','SCONTRINI %','SCONTRINI'];
	foreach($titoliColonna as $i => $titolo) {
		$sheet->getCell(Coordinate::stringFromColumnIndex($i + 1).(1))->setValueExplicit($titolo,DataType::TYPE_STRING);
	}
	for ($offset = 0 ; $offset <= 23; $offset++) {
		$sheet->getCell("A".($offset + 2))->setValueExplicit($offset,DataType::TYPE_NUMERIC);
		$sheet->getCell("B".($offset + 2))
			->setValueExplicit("=ROUND(C".($offset + 2)."/C26,4)",DataType::TYPE_FORMULA);
		$sheet->getCell("C".($offset + 2))
			->setValueExplicit("=SUBTOTAL(109,".Coordinate::stringFromColumnIndex(($offset * 4) + 13).($primaRigaDati).":".Coordinate::stringFromColumnIndex(($offset * 4) + 13).(count($dati['data']) + $primaRigaDati - 1).")",DataType::TYPE_FORMULA);
		$sheet->getCell("D".($offset + 2))
			->setValueExplicit("=ROUND(E".($offset + 2)."/E26,4)",DataType::TYPE_FORMULA);
		$sheet->getCell("E".($offset + 2))
			->setValueExplicit("=SUBTOTAL(109,".Coordinate::stringFromColumnIndex(($offset * 4) + 15).($primaRigaDati).":".Coordinate::stringFromColumnIndex(($offset * 4) + 15).(count($dati['data']) + $primaRigaDati - 1).")",DataType::TYPE_FORMULA);
	}
	$sheet->getCell("C26")->setValueExplicit("=SUM(C2:C25)",DataType::TYPE_FORMULA)->getStyle()->getFont()->setBold(true);
	$sheet->getCell("E26")->setValueExplicit("=SUM(E2:E25)",DataType::TYPE_FORMULA)->getStyle()->getFont()->setBold(true);
	
	// scrittura righe
	// --------------------------------------------------------------------------------

	// prima riga titoli colonna
	$titoliColonna = ['SOC','NEG','NEGOZIO','ANNO','MESE','GIORNO','GG','TIPO_G','SCONTRINI','','INCASSO','NIMIS'];
	foreach($titoliColonna as $i => $titolo) {
		$sheet->getCell(Coordinate::stringFromColumnIndex($i + 1).($primaRigaDati - 2))->setValueExplicit($titolo,DataType::TYPE_STRING);
	}
	$sheet->mergeCells(Coordinate::stringFromColumnIndex(9).($primaRigaDati - 2).':'.Coordinate::stringFromColumnIndex(10).($primaRigaDati - 2));
	$sheet->mergeCells(Coordinate::stringFromColumnIndex(11).($primaRigaDati - 2).':'.Coordinate::stringFromColumnIndex(12).($primaRigaDati - 2));
	for ($offset = 0 ; $offset <= 23; $offset++) {
		$sheet->getCell(Coordinate::stringFromColumnIndex(($offset * 4) + 13).($primaRigaDati - 2))->setValueExplicit("$offset",DataType::TYPE_STRING);
		$sheet->mergeCells(Coordinate::stringFromColumnIndex(($offset * 4) + 13).($primaRigaDati - 2).':'.Coordinate::stringFromColumnIndex(($offset * 4) + 16).($primaRigaDati - 2));
	}
	
	// seconda riga titoli colonna
	$sheet->getCell(Coordinate::stringFromColumnIndex(9).($primaRigaDati - 1))->setValueExplicit('TOTALE',DataType::TYPE_STRING);
	$sheet->getCell(Coordinate::stringFromColumnIndex(10).($primaRigaDati - 1))->setValueExplicit('NIMIS',DataType::TYPE_STRING);
		$sheet->getCell(Coordinate::stringFromColumnIndex(11).($primaRigaDati - 1))->setValueExplicit('TOTALE',DataType::TYPE_STRING);
	$sheet->getCell(Coordinate::stringFromColumnIndex(12).($primaRigaDati - 1))->setValueExplicit('NIMIS',DataType::TYPE_STRING);
	for ($offset = 0 ; $offset <= 23; $offset++) {
		$sheet->getCell(Coordinate::stringFromColumnIndex(($offset * 4) + 1 + count($titoliColonna)).($primaRigaDati - 1))->setValueExplicit('I'.str_pad($offset,2,'0',STR_PAD_LEFT),DataType::TYPE_STRING);
		$sheet->getCell(Coordinate::stringFromColumnIndex(($offset * 4) + 2 + count($titoliColonna)).($primaRigaDati - 1))->setValueExplicit('INC_I_'.str_pad($offset,2,'0',STR_PAD_LEFT),DataType::TYPE_STRING);
		$sheet->getCell(Coordinate::stringFromColumnIndex(($offset * 4) + 3 + count($titoliColonna)).($primaRigaDati - 1))->setValueExplicit('S'.str_pad($offset,2,'0',STR_PAD_LEFT),DataType::TYPE_STRING);
		$sheet->getCell(Coordinate::stringFromColumnIndex(($offset * 4) + 4 + count($titoliColonna)).($primaRigaDati - 1))->setValueExplicit('INC_S_'.str_pad($offset,2,'0',STR_PAD_LEFT),DataType::TYPE_STRING);
	}
	
	// nelle prime 8 colonne unisco la prima riga titoli con la seconda
	for ($offset = 1; $offset <= 8; $offset++) {
		$sheet->mergeCells(Coordinate::stringFromColumnIndex($offset).($primaRigaDati - 2).':'.Coordinate::stringFromColumnIndex($offset).($primaRigaDati - 1));
	}
	
	// righe dati
	foreach ($dati['data'] as $i => $riga) {
		$R = ($i+$primaRigaDati);
		
		$descrizioneNegozio = 'NEGOZIO SCONOSCIUTO';
		if (key_exists($riga['neg'], $elencoNegozi)) {
			$descrizioneNegozio = $elencoNegozi[$riga['neg']]['negozioDescrizione'];
		}
		
		$giornoDellaSettimana = '';
		if ($riga['giornoSettimana'] == 0) {
			$giornoDellaSettimana = 'Lun';
		} elseif ($riga['giornoSettimana'] == 1) {
			$giornoDellaSettimana = 'Mar';
		} elseif ($riga['giornoSettimana'] == 2) {
			$giornoDellaSettimana = 'Mer';
		} elseif ($riga['giornoSettimana'] == 3) {
			$giornoDellaSettimana = 'Gio';
		} elseif ($riga['giornoSettimana'] == 4) {
			$giornoDellaSettimana = 'Ven';
		} elseif ($riga['giornoSettimana'] == 5) {
			$giornoDellaSettimana = 'Sab';
		} elseif ($riga['giornoSettimana'] == 6) {
			$giornoDellaSettimana = 'Dom';
		}
		
		$festivo = '';
		if ($riga['festivo'] == 1) {
			$festivo = 'festivo';
		}
		
		$sheet->getCell(Coordinate::stringFromColumnIndex(1).$R)->setValueExplicit($riga['soc'],DataType::TYPE_STRING);
		$sheet->getCell(Coordinate::stringFromColumnIndex(2).$R)->setValueExplicit($riga['neg'],DataType::TYPE_STRING);
		$sheet->getCell(Coordinate::stringFromColumnIndex(3).$R)->setValueExplicit($descrizioneNegozio,DataType::TYPE_STRING);
		$sheet->getCell(Coordinate::stringFromColumnIndex(4).$R)->setValueExplicit($riga['anno'],DataType::TYPE_NUMERIC);
		$sheet->getCell(Coordinate::stringFromColumnIndex(5).$R)->setValueExplicit($riga['mese'],DataType::TYPE_NUMERIC);
		$sheet->getCell(Coordinate::stringFromColumnIndex(6).$R)->setValueExplicit($riga['giorno'],DataType::TYPE_NUMERIC);
		$sheet->getCell(Coordinate::stringFromColumnIndex(7).$R)->setValueExplicit($giornoDellaSettimana,DataType::TYPE_STRING);
		$sheet->getCell(Coordinate::stringFromColumnIndex(8).$R)->setValueExplicit($festivo,DataType::TYPE_STRING);
		$sheet->getCell(Coordinate::stringFromColumnIndex(9).$R)->setValueExplicit($riga['sc.totale'],DataType::TYPE_NUMERIC);
		$sheet->getCell(Coordinate::stringFromColumnIndex(10).$R)->setValueExplicit($riga['sc.nimis'],DataType::TYPE_NUMERIC);
		$sheet->getCell(Coordinate::stringFromColumnIndex(11).$R)->setValueExplicit($riga['totale'],DataType::TYPE_NUMERIC);
		$sheet->getCell(Coordinate::stringFromColumnIndex(12).$R)->setValueExplicit($riga['totale nimis'],DataType::TYPE_NUMERIC);
		
		for ($offset = 0 ; $offset <= 23; $offset++) {
			$importoPercentuale = '=IF('.Coordinate::stringFromColumnIndex(11).$R.'<>0,'.Coordinate::stringFromColumnIndex(13 + ($offset * 4)).$R.'/'.Coordinate::stringFromColumnIndex(11).$R.',0)';
			$sheet->getCell(Coordinate::stringFromColumnIndex(13 + ($offset * 4)).$R)->setValueExplicit($riga['I'.str_pad($offset,2,'0',STR_PAD_LEFT)],DataType::TYPE_NUMERIC);
			$sheet->getCell(Coordinate::stringFromColumnIndex(14 + ($offset * 4)).$R)->setValueExplicit($importoPercentuale,DataType::TYPE_FORMULA);
			
			$scontriniPercentuale = '=IF('.Coordinate::stringFromColumnIndex(9).$R.'<>0,'.Coordinate::stringFromColumnIndex(15 + ($offset * 4)).$R.'/'.Coordinate::stringFromColumnIndex(9).$R.',0)';
			$sheet->getCell(Coordinate::stringFromColumnIndex(15 + ($offset * 4)).$R)->setValueExplicit($riga['S'.str_pad($offset,2,'0',STR_PAD_LEFT)],DataType::TYPE_NUMERIC);
			$sheet->getCell(Coordinate::stringFromColumnIndex(16 + ($offset * 4)).$R)->setValueExplicit($scontriniPercentuale,DataType::TYPE_FORMULA);
		}
	}
	
	
	// Stili
	// -----------------------------------------------------------------------------------------------------------------------------------
	$titoli =	[
					'font' => [
						'bold' => true,
					],
					'alignment' => [
						'horizontal' => Alignment::HORIZONTAL_CENTER,
						'vertical' => Alignment::VERTICAL_CENTER,
					],
					'borders' => [
						'left' => ['borderStyle' => Border::BORDER_THIN],
						'top' => ['borderStyle' => Border::BORDER_THIN],
						'bottom' => ['borderStyle' => Border::BORDER_THIN],
						'right' => ['borderStyle' => Border::BORDER_THIN],
						'inside' => ['borderStyle' => Border::BORDER_THIN],
					],
				];
	
	$titoliVerticali =	[
					'font' => [
						'bold' => true,
					],
					'alignment' => [
						'horizontal' => Alignment::HORIZONTAL_CENTER,
						'vertical' => Alignment::VERTICAL_CENTER,
					],
					'borders' => [
						'left' => ['borderStyle' => Border::BORDER_THIN],
						'top' => ['borderStyle' => Border::BORDER_THIN],
						'bottom' => ['borderStyle' => Border::BORDER_THIN],
						'right' => ['borderStyle' => Border::BORDER_THIN],
					],
				];
	
	$Riquadro =	[
					'borders' => [
						'left' => ['borderStyle' => Border::BORDER_THIN],
						'top' => ['borderStyle' => Border::BORDER_THIN],
						'bottom' => ['borderStyle' => Border::BORDER_THIN],
						'right' => ['borderStyle' => Border::BORDER_THIN],
						'vertical' => ['borderStyle' => Border::BORDER_THIN],
					],
				];

				
	$sheet->setShowGridlines(false);
	
	// riquadro testata
	$sheet->getColumnDimension('A')->setWidth(8);
	$sheet->getColumnDimension('B')->setWidth(12);
	$sheet->getColumnDimension('C')->setWidth(12);
	$sheet->getColumnDimension('D')->setWidth(12);
	$sheet->getColumnDimension('E')->setWidth(12);
	$sheet->getStyle('A1:E1')->applyFromArray($titoli);
	$sheet->getStyle('A1:A25')->applyFromArray($titoliVerticali);
	
	$sheet->getStyle('B2:B25')->getNumberFormat()->setFormatCode('0.00%;0.00%;');
	$sheet->getStyle('C2:C26')->getNumberFormat()->setFormatCode('#,##0;[Red][<0]#,##0;');
	$sheet->getStyle('D2:D25')->getNumberFormat()->setFormatCode('0.00%;0.00%;');
	$sheet->getStyle('E2:E26')->getNumberFormat()->setFormatCode('#,##0;[Red][<0]#,##0;');
	
	$sheet->getStyle('A1:E25')->applyFromArray($Riquadro);
	
	// righe dati
	$datiRigaInizio = $primaRigaDati - 1;
	$datiRigaFine = $primaRigaDati - 1 + count($dati['data']);
	$range = 'A'.($primaRigaDati - 2).':'.Coordinate::stringFromColumnIndex(108).($primaRigaDati - 1);
	$sheet->getStyle($range)->applyFromArray($titoli);
	$sheet->getStyle("A$datiRigaInizio:DD$datiRigaFine")->applyFromArray($Riquadro);
	$sheet->getStyle("A$datiRigaInizio:B$datiRigaFine")->applyFromArray(['alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER]]);
	$sheet->getStyle("D$datiRigaInizio:F$datiRigaFine")->applyFromArray(['alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER]]);
	
	$sheet->getStyle(Coordinate::stringFromColumnIndex(9)."$datiRigaInizio:".Coordinate::stringFromColumnIndex(12)."$datiRigaFine")->getNumberFormat()->setFormatCode('#,##0;[Red][<0]#,##0;');
	for ($offset = 13 ; $offset <= 108; $offset += 2) {
		$sheet->getStyle(Coordinate::stringFromColumnIndex($offset)."$datiRigaInizio:".Coordinate::stringFromColumnIndex($offset)."$datiRigaFine")->getNumberFormat()->setFormatCode('#,##0;[Red][<0]#,##0;');
		$sheet->getStyle(Coordinate::stringFromColumnIndex($offset + 1)."$datiRigaInizio:".Coordinate::stringFromColumnIndex($offset + 1)."$datiRigaFine")->getNumberFormat()->setFormatCode('0.00%;0.00%;');
	}

	
	// Chart
	// -----------------------------------------------------------------------------------------------------------------------------------
	$dataSeriesLabels = [
							new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, 'Percentili!$B$1', null, 1),
							new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, 'Percentili!$D$1', null, 1),
						];
	$xAxisTickValues =	[
							new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, 'Percentili!$A$2:$A$25', null, 24),
						];
	$dataSeriesValues =	[
							new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_NUMBER, 'Percentili!$B$2:$B$25', null, 24),
							new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_NUMBER, 'Percentili!$D$2:$D$25', null, 24),
						];
	
	
	$series = new DataSeries(
		DataSeries::TYPE_BARCHART, // plotType
		DataSeries::GROUPING_STANDARD, // plotGrouping
		range(0, count($dataSeriesValues) - 1), // plotOrder
		$dataSeriesLabels, // plotLabel
		$xAxisTickValues, // plotCategory
		$dataSeriesValues        // plotValues
	);
	
	$series->setPlotDirection(DataSeries::DIRECTION_COL);
	
	$plotArea = new PlotArea(null, [$series]);
	$legend = new Legend(Legend::POSITION_BOTTOM, null, false);
	
	$title = new Title('Percentili');
	$yAxisLabel = new Title('%');
	
	//	Create the chart
	$chart = new Chart(
		'chart1', // name
		$title, // title
		$legend, // legend
		$plotArea, // plotArea
		true, // plotVisibleOnly
		0, // displayBlanksAs
		null, // xAxisLabel
		null  // yAxisLabel
	);
	
	//	Set the position where the chart should appear in the worksheet
	$chart->setTopLeftPosition('G2');
	$chart->setBottomRightPosition('Y26');
	
	//	Add the chart to the worksheet
	$sheet->addChart($chart);

	$range = Coordinate::stringFromColumnIndex(1).($primaRigaDati - 1).':'.Coordinate::stringFromColumnIndex(8).($primaRigaDati - 1 + count($dati['data']));
	$sheet->setAutoFilter($range);
	
	$writer = new Xlsx($workBook);
	$writer->setIncludeCharts(true);
	$writer->setPreCalculateFormulas(false);
	$writer->save($file);
	
	if (file_exists($file)) {
		$conn_id = ftp_connect($sqlDetails['ftpServer']);       
		$login_result = ftp_login($conn_id, $sqlDetails['ftpUser'], $sqlDetails['ftpPassword']) or die("Login FTP non riuscito");   
		if ((!$conn_id) || (!$login_result)) {  
			echo "La connessione FTP non è aperta! <br />";
			echo "Tentativo di connettersi a $ftp_server dell\'utente $ftp_user_name";
			exit;
		} else {
			ftp_chdir ($conn_id, "Anna Corbetta" ) or die("Cambio directory non riuscito");  
			$upload = ftp_put($conn_id, $nomeFile, $file, FTP_BINARY) or die("Upload non riuscito");  
		}
	  
		ftp_close($conn_id);
	}
	
	exit;
