CREATE TABLE `percentili` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

insert into percentili
select societa, negozio, data, ora, round(sum(totale),2) totale, count(*) scontrini, round(sum(case when carta <> '' then totale else 0 end),2) totaleNimis, sum(case when carta <> '' then 1 else 0 end) nimis, sum(punti_emessi_prodotto) punti_emessi_prodotto, sum(punti_emessi_reparto) punti_emessi_reparto, sum(punti_emessi_ticket) punti_emessi_ticket, sum(punti_redenti) punti_redenti 
from testate_lrp_new
group by 1,2,3,4
order by 1,2,3,4;

