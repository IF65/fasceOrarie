SELECT to_char(to_date(t.ID_TEMPO,'J'),'YYYY-MM-DD'), FLOOR(t.ID_MINUTO/60), p.CODICE,  
nvl(t.IMPORTO,0), nvl(t.PUNTI_EMESSI_PRODOTTO,0), nvl(t.PUNTI_EMESSI_REPARTO,0), nvl(t.PUNTI_EMESSI_TICKET,0),nvl(t.PUNTI_REDENTI,0) 
from testate t, pdv p 
where t.ID_PDV = p."ID" and 
to_date(t.ID_TEMPO,'J')=to_date('2018/10/08','YYYY/MM/DD');
