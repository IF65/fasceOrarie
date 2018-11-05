<?php
    namespace Database\Tabelle;

	class Percentili {
        private $pdo = null;
        
        private $tableName = 'percentili';
        private $dataBaseName = 'controllo';

        public function __construct($pdo) {
        	try {
                $this->pdo = $pdo;
                
				self::creaTabella();

            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }

        private function creaTabella() {
        	try {
                $sql = "CREATE TABLE IF NOT EXISTS ".$this->dataBaseName.'.'.$this->tableName." (
                        `societa` varchar(2) NOT NULL DEFAULT '',
                        `negozio` varchar(4) NOT NULL DEFAULT '',
                        `data` date NOT NULL,
                        `ora` tinyint(3) unsigned NOT NULL DEFAULT '0',
                        `totale` decimal(11,2) unsigned NOT NULL DEFAULT '0.00',
                        `scontrini` smallint(5) unsigned NOT NULL DEFAULT '0',
                        `totaleNimis` decimal(11,2) unsigned NOT NULL DEFAULT '0.00',
                        `scontriniNimis` smallint(5) unsigned NOT NULL DEFAULT '0',
                        `puntiEmessiProdotto` smallint(5) unsigned NOT NULL DEFAULT '0',
                        `puntiEmessiReparto` smallint(5) unsigned NOT NULL DEFAULT '0',
                        `puntiEmessiTicket` smallint(5) unsigned NOT NULL DEFAULT '0',
                        `puntiRedenti` smallint(5) unsigned NOT NULL DEFAULT '0',
                        PRIMARY KEY (`negozio`,`data`,`ora`),
                        KEY `main` (`societa`,`data`,`ora`)
                      ) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
                $this->pdo->prepare($sql)->execute();
				
                return true;
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        
        public function aggiorna() {
            try {
                $sql = "DROP TABLE IF EXISTS ".$this->dataBaseName.'.'.$this->tableName.";";
                $this->pdo->prepare($sql)->execute();
                
                $this->creaTabella();
                
                $sql = "insert into ".$this->dataBaseName.'.'.$this->tableName."
                        select societa, negozio, data, ora, round(sum(totale),2) totale, count(*) scontrini, round(sum(case when carta <> '' then totale else 0 end),2) totaleNimis,
                            sum(case when carta <> '' then 1 else 0 end) nimis, sum(punti_emessi_prodotto) punti_emessi_prodotto,
                            sum(punti_emessi_reparto) punti_emessi_reparto, sum(punti_emessi_ticket) punti_emessi_ticket, sum(punti_redenti) punti_redenti 
                        from ".$this->dataBaseName.".testate_lrp_new
                        group by 1,2,3,4
                        order by 1,2,3,4;";
                $this->pdo->prepare($sql)->execute();
                
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }

        public function ricerca(array $query) {
            try {
                    $societa = $query['societa'];
                    $dallaData = $query['dallaData'];
                    
                    $stmt = $this->pdo->prepare("select 
                                                p.`societa` soc,
                                                p.`negozio` neg,
                                                year(p.`data`) anno,
                                                month(p.`data`) mese,
                                                day(p.`data`) giorno,
                                                cg.`giornoSettimana`,
                                                cg.`festivo`,
                                                sum(p.`scontrini`) 'sc.totale',
                                                sum(p.`scontriniNimis`) 'sc.nimis',
                                                sum(p.`totale`) totale,
                                                sum(p.`totaleNimis`) 'totale nimis',
                                                sum(case when ora = 0 then p.`scontrini` else 0 end) S00,
                                                sum(case when ora = 0 then p.`totale` else 0 end) I00,
                                                sum(case when ora = 1 then p.`scontrini` else 0 end) S01,
                                                sum(case when ora = 1 then p.`totale` else 0 end) I01,
                                                sum(case when ora = 2 then p.`scontrini` else 0 end) S02,
                                                sum(case when ora = 2 then p.`totale` else 0 end) I02,
                                                sum(case when ora = 3 then p.`scontrini` else 0 end) S03,
                                                sum(case when ora = 3 then p.`totale` else 0 end) I03,
                                                sum(case when ora = 4 then p.`scontrini` else 0 end) S04,
                                                sum(case when ora = 4 then p.`totale` else 0 end) I04,
                                                sum(case when ora = 5 then p.`scontrini` else 0 end) S05,
                                                sum(case when ora = 5 then p.`totale` else 0 end) I05,
                                                sum(case when ora = 6 then p.`scontrini` else 0 end) S06,
                                                sum(case when ora = 6 then p.`totale` else 0 end) I06,
                                                sum(case when ora = 7 then p.`scontrini` else 0 end) S07,
                                                sum(case when ora = 7 then p.`totale` else 0 end) I07,
                                                sum(case when ora = 8 then p.`scontrini` else 0 end) S08,
                                                sum(case when ora = 8 then p.`totale` else 0 end) I08,
                                                sum(case when ora = 9 then p.`scontrini` else 0 end) S09,
                                                sum(case when ora = 9 then p.`totale` else 0 end) I09,
                                                sum(case when ora = 10 then p.`scontrini` else 0 end) S10,
                                                sum(case when ora = 10 then p.`totale` else 0 end) I10,
                                                sum(case when ora = 11 then p.`scontrini` else 0 end) S11,
                                                sum(case when ora = 11 then p.`totale` else 0 end) I11,
                                                sum(case when ora = 12 then p.`scontrini` else 0 end) S12,
                                                sum(case when ora = 12 then p.`totale` else 0 end) I12,
                                                sum(case when ora = 13 then p.`scontrini` else 0 end) S13,
                                                sum(case when ora = 13 then p.`totale` else 0 end) I13,
                                                sum(case when ora = 14 then p.`scontrini` else 0 end) S14,
                                                sum(case when ora = 14 then p.`totale` else 0 end) I14,
                                                sum(case when ora = 15 then p.`scontrini` else 0 end) S15,
                                                sum(case when ora = 15 then p.`totale` else 0 end) I15,
                                                sum(case when ora = 16 then p.`scontrini` else 0 end) S16,
                                                sum(case when ora = 16 then p.`totale` else 0 end) I16,
                                                sum(case when ora = 17 then p.`scontrini` else 0 end) S17,
                                                sum(case when ora = 17 then p.`totale` else 0 end) I17,
                                                sum(case when ora = 18 then p.`scontrini` else 0 end) S18,
                                                sum(case when ora = 18 then p.`totale` else 0 end) I18,
                                                sum(case when ora = 19 then p.`scontrini` else 0 end) S19,
                                                sum(case when ora = 19 then p.`totale` else 0 end) I19,
                                                sum(case when ora = 20 then p.`scontrini` else 0 end) S20,
                                                sum(case when ora = 20 then p.`totale` else 0 end) I20,
                                                sum(case when ora = 21 then p.`scontrini` else 0 end) S21,
                                                sum(case when ora = 21 then p.`totale` else 0 end) I21,
                                                sum(case when ora = 22 then p.`scontrini` else 0 end) S22,
                                                sum(case when ora = 22 then p.`totale` else 0 end) I22,
                                                sum(case when ora = 23 then p.`scontrini` else 0 end) S23,
                                                sum(case when ora = 23 then p.`totale` else 0 end) I23
                                            from ".$this->dataBaseName.'.'.$this->tableName." as p join archivi.calendarioGiornaliero as cg  on p.`data`=cg.`data`
                                            where p.`data`>='$dallaData' 
                                            group by p.`societa`,p.`negozio`,p.`data`
                                            order by p.`societa`,p.`negozio`,p.`data`");
                if ($stmt->execute()) {
                    $arrayData = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                    $recordsCount = count($arrayData);
                    
                    return array( "recordsTotal" => $recordsCount, "data" => $arrayData );
                } else {
                    return array( "recordsTotal" => 0, "data" => [] );
                }
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }

        public function __destruct() {
			unset($this->pdo);
        }

    }
?>
