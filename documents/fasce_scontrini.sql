drop table if exists ncr.decili;

CREATE TABLE if not exists ncr.`decili` (
  `SOC` varchar(3) NOT NULL,
  `NEG` varchar(3) NOT NULL,
  `NEGOZIO` varchar(30) not null default '',
  `ANNO` varchar(4) NOT NULL,
  `SETTIMANA` varchar(2) NOT NULL,
  DAL varchar(8) nOT NULL,
  AL VARCHAR(8) NOT NULL,
  `SCONTRINI` bigint(21) NOT NULL DEFAULT '0',
  `INCASSO_TOTALE` decimal(28,2) DEFAULT NULL,
      `S_00` decimal(23,0) DEFAULT NULL,
  `INC_S_00` decimal(8,4) DEFAULT NULL,
      `I_00` decimal(28,2) DEFAULT NULL,
  `INC_I_00` decimal(8,4) DEFAULT NULL,
      `S_05` decimal(23,0) DEFAULT NULL,
  `INC_S_05` decimal(8,4) DEFAULT NULL,
      `I_05` decimal(28,2) DEFAULT NULL,
  `INC_I_05` decimal(8,4) DEFAULT NULL,
      `S_10` decimal(23,0) DEFAULT NULL,
  `INC_S_10` decimal(8,4) DEFAULT NULL,
      `I_10` decimal(28,2) DEFAULT NULL,
  `INC_I_10` decimal(8,4) DEFAULT NULL,
      `S_15` decimal(23,0) DEFAULT NULL,
  `INC_S_15` decimal(8,4) DEFAULT NULL,
      `I_15` decimal(28,2) DEFAULT NULL,
  `INC_I_15` decimal(8,4) DEFAULT NULL,
      `S_20` decimal(23,0) DEFAULT NULL,
  `INC_S_20` decimal(8,4) DEFAULT NULL,
      `I_20` decimal(28,2) DEFAULT NULL,
  `INC_I_20` decimal(8,4) DEFAULT NULL,
      `S_25` decimal(23,0) DEFAULT NULL,
  `INC_S_25` decimal(8,4) DEFAULT NULL,
      `I_25` decimal(28,2) DEFAULT NULL,
  `INC_I_25` decimal(8,4) DEFAULT NULL,
      `S_30` decimal(23,0) DEFAULT NULL,
  `INC_S_30` decimal(8,4) DEFAULT NULL,
      `I_30` decimal(28,2) DEFAULT NULL,
  `INC_I_30` decimal(8,4) DEFAULT NULL,
      `S_35` decimal(23,0) DEFAULT NULL,
  `INC_S_35` decimal(8,4) DEFAULT NULL,
      `I_35` decimal(28,2) DEFAULT NULL,
  `INC_I_35` decimal(8,4) DEFAULT NULL,
      `S_40` decimal(23,0) DEFAULT NULL,
  `INC_S_40` decimal(8,4) DEFAULT NULL,
      `I_40` decimal(28,2) DEFAULT NULL,
  `INC_I_40` decimal(8,4) DEFAULT NULL,
      `S_45` decimal(23,0) DEFAULT NULL,
  `INC_S_45` decimal(8,4) DEFAULT NULL,
      `I_45` decimal(28,2) DEFAULT NULL,
  `INC_I_45` decimal(8,4) DEFAULT NULL,
      `S_50` decimal(23,0) DEFAULT NULL,
  `INC_S_50` decimal(8,4) DEFAULT NULL,
      `I_50` decimal(28,2) DEFAULT NULL,
  `INC_I_50` decimal(8,4) DEFAULT NULL,
      `S_55` decimal(23,0) DEFAULT NULL,
  `INC_S_55` decimal(8,4) DEFAULT NULL,
      `I_55` decimal(28,2) DEFAULT NULL,
  `INC_I_55` decimal(8,4) DEFAULT NULL,
      `S_60` decimal(23,0) DEFAULT NULL,
  `INC_S_60` decimal(8,4) DEFAULT NULL,
      `I_60` decimal(28,2) DEFAULT NULL,
  `INC_I_60` decimal(8,4) DEFAULT NULL,
      `S_65` decimal(23,0) DEFAULT NULL,
  `INC_S_65` decimal(8,4) DEFAULT NULL,
      `I_65` decimal(28,2) DEFAULT NULL,
  `INC_I_65` decimal(8,4) DEFAULT NULL,
      `S_70` decimal(23,0) DEFAULT NULL,
  `INC_S_70` decimal(8,4) DEFAULT NULL,
      `I_70` decimal(28,2) DEFAULT NULL,
  `INC_I_70` decimal(8,4) DEFAULT NULL,
      `S_75` decimal(23,0) DEFAULT NULL,
  `INC_S_75` decimal(8,4) DEFAULT NULL,
      `I_75` decimal(28,2) DEFAULT NULL,
  `INC_I_75` decimal(8,4) DEFAULT NULL,
      `S_80` decimal(23,0) DEFAULT NULL,
  `INC_S_80` decimal(8,4) DEFAULT NULL,
      `I_80` decimal(28,2) DEFAULT NULL,
  `INC_I_80` decimal(8,4) DEFAULT NULL,
      `S_85` decimal(23,0) DEFAULT NULL,
  `INC_S_85` decimal(8,4) DEFAULT NULL,
      `I_85` decimal(28,2) DEFAULT NULL,
  `INC_I_85` decimal(8,4) DEFAULT NULL,
      `S_90` decimal(23,0) DEFAULT NULL,
  `INC_S_90` decimal(8,4) DEFAULT NULL,
      `I_90` decimal(28,2) DEFAULT NULL,
  `INC_I_90` decimal(8,4) DEFAULT NULL,
      `S_95` decimal(23,0) DEFAULT NULL,
  `INC_S_95` decimal(8,4) DEFAULT NULL,
      `I_95` decimal(28,2) DEFAULT NULL,
  `INC_I_95` decimal(8,4) DEFAULT NULL,
      `S_100` decimal(23,0) DEFAULT NULL,
  `INC_S_100` decimal(8,4) DEFAULT NULL,
      `I_100` decimal(28,2) DEFAULT NULL,
  `INC_I_100` decimal(8,4) DEFAULT NULL,
      `S_105` decimal(23,0) DEFAULT NULL,
  `INC_S_105` decimal(8,4) DEFAULT NULL,
      `I_105` decimal(28,2) DEFAULT NULL,
  `INC_I_105` decimal(8,4) DEFAULT NULL,
      `S_110` decimal(23,0) DEFAULT NULL,
  `INC_S_110` decimal(8,4) DEFAULT NULL,
      `I_110` decimal(28,2) DEFAULT NULL,
  `INC_I_110` decimal(8,4) DEFAULT NULL,
      `S_115` decimal(23,0) DEFAULT NULL,
  `INC_S_115` decimal(8,4) DEFAULT NULL,
      `I_115` decimal(28,2) DEFAULT NULL,
  `INC_I_115` decimal(8,4) DEFAULT NULL,
      `S_120` decimal(23,0) DEFAULT NULL,
  `INC_S_120` decimal(8,4) DEFAULT NULL,
      `I_120` decimal(28,2) DEFAULT NULL,
  `INC_I_120` decimal(8,4) DEFAULT NULL,
      `S_125` decimal(23,0) DEFAULT NULL,
  `INC_S_125` decimal(8,4) DEFAULT NULL,
      `I_125` decimal(28,2) DEFAULT NULL,
  `INC_I_125` decimal(8,4) DEFAULT NULL,
      `S_130` decimal(23,0) DEFAULT NULL,
  `INC_S_130` decimal(8,4) DEFAULT NULL,
      `I_130` decimal(28,2) DEFAULT NULL,
  `INC_I_130` decimal(8,4) DEFAULT NULL,
      `S_135` decimal(23,0) DEFAULT NULL,
  `INC_S_135` decimal(8,4) DEFAULT NULL,
      `I_135` decimal(28,2) DEFAULT NULL,
  `INC_I_135` decimal(8,4) DEFAULT NULL,
      `S_140` decimal(23,0) DEFAULT NULL,
  `INC_S_140` decimal(8,4) DEFAULT NULL,
      `I_140` decimal(28,2) DEFAULT NULL,
  `INC_I_140` decimal(8,4) DEFAULT NULL,
      `S_145` decimal(23,0) DEFAULT NULL,
  `INC_S_145` decimal(8,4) DEFAULT NULL,
      `I_145` decimal(28,2) DEFAULT NULL,
  `INC_I_145` decimal(8,4) DEFAULT NULL,
      `S_150` decimal(23,0) DEFAULT NULL,
  `INC_S_150` decimal(8,4) DEFAULT NULL,
      `I_150` decimal(28,2) DEFAULT NULL,
  `INC_I_150` decimal(8,4) DEFAULT NULL,
      `S_155` decimal(23,0) DEFAULT NULL,
  `INC_S_155` decimal(8,4) DEFAULT NULL,
      `I_155` decimal(28,2) DEFAULT NULL,
  `INC_I_155` decimal(8,4) DEFAULT NULL,
      `S_160` decimal(23,0) DEFAULT NULL,
  `INC_S_160` decimal(8,4) DEFAULT NULL,
      `I_160` decimal(28,2) DEFAULT NULL,
  `INC_I_160` decimal(8,4) DEFAULT NULL,
      `S_165` decimal(23,0) DEFAULT NULL,
  `INC_S_165` decimal(8,4) DEFAULT NULL,
      `I_165` decimal(28,2) DEFAULT NULL,
  `INC_I_165` decimal(8,4) DEFAULT NULL,
      `S_170` decimal(23,0) DEFAULT NULL,
  `INC_S_170` decimal(8,4) DEFAULT NULL,
      `I_170` decimal(28,2) DEFAULT NULL,
  `INC_I_170` decimal(8,4) DEFAULT NULL,
      `S_175` decimal(23,0) DEFAULT NULL,
  `INC_S_175` decimal(8,4) DEFAULT NULL,
      `I_175` decimal(28,2) DEFAULT NULL,
  `INC_I_175` decimal(8,4) DEFAULT NULL,
      `S_180` decimal(23,0) DEFAULT NULL,
  `INC_S_180` decimal(8,4) DEFAULT NULL,
      `I_180` decimal(28,2) DEFAULT NULL,
  `INC_I_180` decimal(8,4) DEFAULT NULL,
      `S_185` decimal(23,0) DEFAULT NULL,
  `INC_S_185` decimal(8,4) DEFAULT NULL,
      `I_185` decimal(28,2) DEFAULT NULL,
  `INC_I_185` decimal(8,4) DEFAULT NULL,
      `S_190` decimal(23,0) DEFAULT NULL,
  `INC_S_190` decimal(8,4) DEFAULT NULL,
      `I_190` decimal(28,2) DEFAULT NULL,
  `INC_I_190` decimal(8,4) DEFAULT NULL,
      `S_195` decimal(23,0) DEFAULT NULL,
  `INC_S_195` decimal(8,4) DEFAULT NULL,
      `I_195` decimal(28,2) DEFAULT NULL,
  `INC_I_195` decimal(8,4) DEFAULT NULL,
      `S_200` decimal(23,0) DEFAULT NULL,
  `INC_S_200` decimal(8,4) DEFAULT NULL,
      `I_200` decimal(28,2) DEFAULT NULL,
  `INC_I_200` decimal(8,4) DEFAULT NULL, 
  
  primary key(SOC, NEG, ANNO, SETTIMANA)
) ENGINE=MyIsam ;

insert into ncr.decili (
SOC           ,
NEG           ,
ANNO          ,
SETTIMANA     ,
DAL,
AL,
SCONTRINI     ,
incasso_totale,
S_00           ,
I_00           ,
S_05           ,
I_05           ,
S_10          ,
I_10          ,
S_15           ,
I_15           ,
S_20          ,
I_20          ,
S_25           ,
I_25           ,
S_30          ,
I_30          ,
S_35           ,
I_35           ,
S_40          ,
I_40          ,
S_45           ,
I_45           ,
S_50          ,
I_50          ,
S_55           ,
I_55           ,
S_60          ,
I_60          ,
S_65           ,
I_65           ,
S_70          ,
I_70          ,
S_75           ,
I_75           ,
S_80          ,
I_80          ,
S_85           ,
I_85           ,
S_90          ,
I_90          ,
S_95           ,
I_95           ,
S_100         ,
I_100         ,
S_115           ,
I_115           ,
S_110         ,
I_110         ,
S_115           ,
I_115           ,
S_120         ,
I_120         ,
S_125           ,
I_125           ,
S_130         ,
I_130         ,
S_135           ,
I_135           ,
S_140         ,
I_140         ,
S_145          ,
I_145          ,
S_150         ,
I_150         ,
S_155          ,
I_155          ,
S_160         ,
I_160         ,
S_165           ,
I_165           ,
S_170         ,
I_170         ,
S_175           ,
I_175           ,
S_180         ,
I_180         ,
S_185           ,
I_185           ,
S_190         ,
I_190         ,
S_195           ,
I_195           ,
S_200         ,
I_200)

select          substr(P.negozio,1,2)   ,
                substr(P.negozio,3,2)  ,
                T.ANNO  ,
                T.settimana,
                min(T.anno_mese_giorno) as DAL,
                max(T.anno_mese_giorno) as AL,
                count(TRANSAZIONE) as SCONTRINI,
                sum(valore_scontrino) as incasso_totale,
sum(case when valore_scontrino >  0     and valore_scontrino < 5    then 1 else 0 end) as S_0    ,
sum(case when valore_scontrino >  0     and valore_scontrino < 5    then valore_scontrino else 0 end) as I_0    ,
sum(case when valore_scontrino >  5     and valore_scontrino < 10   then 1 else 0 end) as S_5    ,
sum(case when valore_scontrino >  5     and valore_scontrino < 10   then valore_scontrino else 0 end) as I_5    ,
sum(case when valore_scontrino >= 10    and valore_scontrino < 15   then 1 else 0 end) as S_10   ,
sum(case when valore_scontrino >= 10    and valore_scontrino < 15   then valore_scontrino else 0 end) as I_10   ,
sum(case when valore_scontrino >= 15    and valore_scontrino < 20   then 1 else 0 end),
sum(case when valore_scontrino >= 15    and valore_scontrino < 20   then valore_scontrino else 0 end),
sum(case when valore_scontrino >= 20    and valore_scontrino < 25   then 1 else 0 end) as S_20   ,
sum(case when valore_scontrino >= 20    and valore_scontrino < 25   then valore_scontrino else 0 end) as I_20   ,
sum(case when valore_scontrino >= 25    and valore_scontrino < 30   then 1 else 0 end),
sum(case when valore_scontrino >= 25    and valore_scontrino < 30   then valore_scontrino else 0 end),
sum(case when valore_scontrino >= 30    and valore_scontrino < 35   then 1 else 0 end) as S_30   ,
sum(case when valore_scontrino >= 30    and valore_scontrino < 35   then valore_scontrino else 0 end) as I_30   ,
sum(case when valore_scontrino >= 35    and valore_scontrino < 40   then 1 else 0 end),
sum(case when valore_scontrino >= 35    and valore_scontrino < 40   then valore_scontrino else 0 end),
sum(case when valore_scontrino >= 40    and valore_scontrino < 45   then 1 else 0 end) as S_40   ,
sum(case when valore_scontrino >= 40    and valore_scontrino < 45   then valore_scontrino else 0 end) as I_40   ,
sum(case when valore_scontrino >= 45    and valore_scontrino < 50   then 1 else 0 end),
sum(case when valore_scontrino >= 45    and valore_scontrino < 50   then valore_scontrino else 0 end),
sum(case when valore_scontrino >= 50    and valore_scontrino < 55   then 1 else 0 end) as S_50   ,
sum(case when valore_scontrino >= 50    and valore_scontrino < 55   then valore_scontrino else 0 end) as I_50   ,
sum(case when valore_scontrino >= 55    and valore_scontrino < 60   then 1 else 0 end),
sum(case when valore_scontrino >= 55    and valore_scontrino < 60   then valore_scontrino else 0 end),
sum(case when valore_scontrino >= 60    and valore_scontrino < 65   then 1 else 0 end) as S_60   ,
sum(case when valore_scontrino >= 60    and valore_scontrino < 65   then valore_scontrino else 0 end) as I_60   ,
sum(case when valore_scontrino >= 65    and valore_scontrino < 70   then 1 else 0 end),
sum(case when valore_scontrino >= 65    and valore_scontrino < 70   then valore_scontrino else 0 end),
sum(case when valore_scontrino >= 70    and valore_scontrino < 75   then 1 else 0 end) as S_70   ,
sum(case when valore_scontrino >= 70    and valore_scontrino < 75   then valore_scontrino else 0 end) as I_70   ,
sum(case when valore_scontrino >= 75    and valore_scontrino < 80   then 1 else 0 end),
sum(case when valore_scontrino >= 75    and valore_scontrino < 80   then valore_scontrino else 0 end),
sum(case when valore_scontrino >= 80    and valore_scontrino < 85   then 1 else 0 end) as S_80   ,
sum(case when valore_scontrino >= 80    and valore_scontrino < 85   then valore_scontrino else 0 end) as I_80   ,
sum(case when valore_scontrino >= 85    and valore_scontrino < 90   then 1 else 0 end),
sum(case when valore_scontrino >= 85    and valore_scontrino < 90   then valore_scontrino else 0 end),
sum(case when valore_scontrino >= 90    and valore_scontrino < 95   then 1 else 0 end) as S_90   ,
sum(case when valore_scontrino >= 90    and valore_scontrino < 95   then valore_scontrino else 0 end) as I_90   ,
sum(case when valore_scontrino >= 95    and valore_scontrino < 100  then 1 else 0 end),
sum(case when valore_scontrino >= 95    and valore_scontrino < 100  then valore_scontrino else 0 end),
sum(case when valore_scontrino >= 100   and valore_scontrino < 105  then 1 else 0 end) as S_100  ,
sum(case when valore_scontrino >= 100   and valore_scontrino < 105  then valore_scontrino else 0 end) as I_100  ,
sum(case when valore_scontrino >= 105   and valore_scontrino < 110  then 1 else 0 end),
sum(case when valore_scontrino >= 105   and valore_scontrino < 110  then valore_scontrino else 0 end),
sum(case when valore_scontrino >= 110   and valore_scontrino < 115  then 1 else 0 end) as S_110  ,
sum(case when valore_scontrino >= 110   and valore_scontrino < 115  then valore_scontrino else 0 end) as I_110  ,
sum(case when valore_scontrino >= 115   and valore_scontrino < 120  then 1 else 0 end),
sum(case when valore_scontrino >= 115   and valore_scontrino < 120  then valore_scontrino else 0 end),
sum(case when valore_scontrino >= 120   and valore_scontrino < 125  then 1 else 0 end) as S_120  ,
sum(case when valore_scontrino >= 120   and valore_scontrino < 125  then valore_scontrino else 0 end) as I_120  ,
sum(case when valore_scontrino >= 125   and valore_scontrino < 130  then 1 else 0 end),
sum(case when valore_scontrino >= 125   and valore_scontrino < 130  then valore_scontrino else 0 end),
sum(case when valore_scontrino >= 130   and valore_scontrino < 135  then 1 else 0 end) as S_130  ,
sum(case when valore_scontrino >= 130   and valore_scontrino < 135  then valore_scontrino else 0 end) as I_130  ,
sum(case when valore_scontrino >= 135   and valore_scontrino < 140  then 1 else 0 end),
sum(case when valore_scontrino >= 135   and valore_scontrino < 140  then valore_scontrino else 0 end),
sum(case when valore_scontrino >= 140   and valore_scontrino < 145  then 1 else 0 end) as S_140  ,
sum(case when valore_scontrino >= 140   and valore_scontrino < 145  then valore_scontrino else 0 end) as I_140  ,
sum(case when valore_scontrino >= 145   and valore_scontrino < 150  then 1 else 0 end),
sum(case when valore_scontrino >= 145   and valore_scontrino < 150  then valore_scontrino else 0 end),
sum(case when valore_scontrino >= 150   and valore_scontrino < 155  then 1 else 0 end) as S_150  ,
sum(case when valore_scontrino >= 150   and valore_scontrino < 155  then valore_scontrino else 0 end) as I_150  ,
sum(case when valore_scontrino >= 155   and valore_scontrino < 160  then 1 else 0 end),
sum(case when valore_scontrino >= 155   and valore_scontrino < 160  then valore_scontrino else 0 end),
sum(case when valore_scontrino >= 160   and valore_scontrino < 165  then 1 else 0 end) as S_160  ,
sum(case when valore_scontrino >= 160   and valore_scontrino < 165  then valore_scontrino else 0 end) as I_160  ,
sum(case when valore_scontrino >= 165   and valore_scontrino < 170  then 1 else 0 end),
sum(case when valore_scontrino >= 165   and valore_scontrino < 170  then valore_scontrino else 0 end),
sum(case when valore_scontrino >= 170   and valore_scontrino < 175  then 1 else 0 end) as S_170  ,
sum(case when valore_scontrino >= 170   and valore_scontrino < 175  then valore_scontrino else 0 end) as I_170  ,
sum(case when valore_scontrino >= 175   and valore_scontrino < 180  then 1 else 0 end),
sum(case when valore_scontrino >= 175   and valore_scontrino < 180  then valore_scontrino else 0 end),
sum(case when valore_scontrino >= 180   and valore_scontrino < 185  then 1 else 0 end) as S_180  ,
sum(case when valore_scontrino >= 180   and valore_scontrino < 185  then valore_scontrino else 0 end) as I_180  ,
sum(case when valore_scontrino >= 185   and valore_scontrino < 190  then 1 else 0 end),
sum(case when valore_scontrino >= 185   and valore_scontrino < 190  then valore_scontrino else 0 end),
sum(case when valore_scontrino >= 190   and valore_scontrino < 195  then 1 else 0 end) as S_190  ,
sum(case when valore_scontrino >= 190   and valore_scontrino < 195  then valore_scontrino else 0 end) as I_190  ,
sum(case when valore_scontrino >= 195   and valore_scontrino < 200   then 1 else 0 end),
sum(case when valore_scontrino >= 195   and valore_scontrino < 200   then valore_scontrino else 0 end),
sum(case when valore_scontrino >= 200                               then 1 else 0 end) as S_200  ,
sum(case when valore_scontrino >= 200                               then valore_scontrino else 0 end) as I_200  
    
from        ncr.scontrini       P
inner join  dimensioni.tempo    T
on          concat("20",P.giorno) = T.anno_mese_giorno
where       valore_scontrino > 0
group by 
        P.NEGOZIO,
        T.ANNO,
        T.settimana;
        
        
update   ncr.decili         D
inner join dimensioni.negozio   N
on      D.soc = N.idsocieta     
and     D.neg = N.idnegozio
set     D.negozio = N. negozio;    

update  ncr.decili
set     INC_S_00  = round(S_00 /SCONTRINI,4),
        INC_S_05  = round(S_05 /SCONTRINI,4),
        INC_S_10  = round(S_10 /SCONTRINI,4),
        INC_S_15  = round(S_15 /SCONTRINI,4),
        INC_S_20  = round(S_20 /SCONTRINI,4),
        INC_S_25  = round(S_25 /SCONTRINI,4),
        INC_S_30  = round(S_30 /SCONTRINI,4),
        INC_S_35  = round(S_35 /SCONTRINI,4),
        INC_S_40  = round(S_40 /SCONTRINI,4),
        INC_S_45  = round(S_45 /SCONTRINI,4),
        INC_S_50  = round(S_50 /SCONTRINI,4),
        INC_S_55  = round(S_55 /SCONTRINI,4),
        INC_S_60  = round(S_60 /SCONTRINI,4),
        INC_S_65  = round(S_65 /SCONTRINI,4),
        INC_S_70  = round(S_70 /SCONTRINI,4),
        INC_S_75  = round(S_75 /SCONTRINI,4),
        INC_S_80  = round(S_80 /SCONTRINI,4),
        INC_S_85  = round(S_85 /SCONTRINI,4),
        INC_S_90  = round(S_90 /SCONTRINI,4),
        INC_S_95  = round(S_95 /SCONTRINI,4),
        INC_S_100 = round(S_100/SCONTRINI,4),
        INC_S_105 = round(S_105/SCONTRINI,4),
        INC_S_110 = round(S_110/SCONTRINI,4),
        INC_S_115 = round(S_115/SCONTRINI,4),
        INC_S_120 = round(S_120/SCONTRINI,4),
        INC_S_125 = round(S_125/SCONTRINI,4),
        INC_S_130 = round(S_130/SCONTRINI,4),
        INC_S_135 = round(S_135/SCONTRINI,4),
        INC_S_140 = round(S_140/SCONTRINI,4),
        INC_S_145 = round(S_145/SCONTRINI,4),
        INC_S_150 = round(S_150/SCONTRINI,4),
        INC_S_155 = round(S_155/SCONTRINI,4),
        INC_S_160 = round(S_160/SCONTRINI,4),
        INC_S_165 = round(S_165/SCONTRINI,4),
        INC_S_170 = round(S_170/SCONTRINI,4),
        INC_S_175 = round(S_175/SCONTRINI,4),
        INC_S_180 = round(S_180/SCONTRINI,4),
        INC_S_185 = round(S_185/SCONTRINI,4),
        INC_S_190 = round(S_190/SCONTRINI,4),
        INC_S_195 = round(S_195/SCONTRINI,4),
        INC_S_200 = round(S_200/SCONTRINI,4),
        INC_I_00  = round(I_00 /INCASSO_TOTALE,4),
        INC_I_05  = round(I_05 /INCASSO_TOTALE,4),
        INC_I_10  = round(I_10 /INCASSO_TOTALE,4),
        INC_I_15  = round(I_15 /INCASSO_TOTALE,4),
        INC_I_20  = round(I_20 /INCASSO_TOTALE,4),
        INC_I_25  = round(I_25 /INCASSO_TOTALE,4),
        INC_I_30  = round(I_30 /INCASSO_TOTALE,4),
        INC_I_35  = round(I_35 /INCASSO_TOTALE,4),
        INC_I_40  = round(I_40 /INCASSO_TOTALE,4),
        INC_I_45  = round(I_45 /INCASSO_TOTALE,4),
        INC_I_50  = round(I_50 /INCASSO_TOTALE,4),
        INC_I_55  = round(I_55 /INCASSO_TOTALE,4),
        INC_I_60  = round(I_60 /INCASSO_TOTALE,4),
        INC_I_65  = round(I_65 /INCASSO_TOTALE,4),
        INC_I_70  = round(I_70 /INCASSO_TOTALE,4),
        INC_I_75  = round(I_75 /INCASSO_TOTALE,4),
        INC_I_80  = round(I_80 /INCASSO_TOTALE,4),
        INC_I_85  = round(I_85 /INCASSO_TOTALE,4),
        INC_I_90  = round(I_90 /INCASSO_TOTALE,4),
        INC_I_95  = round(I_95 /INCASSO_TOTALE,4),
        INC_I_100 = round(I_100/INCASSO_TOTALE,4),
        INC_I_105 = round(I_105/INCASSO_TOTALE,4),
        INC_I_110 = round(I_110/INCASSO_TOTALE,4),
        INC_I_115 = round(I_115/INCASSO_TOTALE,4),
        INC_I_120 = round(I_120/INCASSO_TOTALE,4),
        INC_I_125 = round(I_125/INCASSO_TOTALE,4),
        INC_I_130 = round(I_130/INCASSO_TOTALE,4),
        INC_I_135 = round(I_135/INCASSO_TOTALE,4),
        INC_I_140 = round(I_140/INCASSO_TOTALE,4),
        INC_I_145 = round(I_145/INCASSO_TOTALE,4),
        INC_I_150 = round(I_150/INCASSO_TOTALE,4),
        INC_I_155 = round(I_155/INCASSO_TOTALE,4),
        INC_I_160 = round(I_160/INCASSO_TOTALE,4),
        INC_I_165 = round(I_165/INCASSO_TOTALE,4),
        INC_I_170 = round(I_170/INCASSO_TOTALE,4),
        INC_I_175 = round(I_175/INCASSO_TOTALE,4),
        INC_I_180 = round(I_180/INCASSO_TOTALE,4),
        INC_I_185 = round(I_185/INCASSO_TOTALE,4),
        INC_I_190 = round(I_190/INCASSO_TOTALE,4),
        INC_I_195 = round(I_195/INCASSO_TOTALE,4),
        INC_I_200 = round(I_200/INCASSO_TOTALE,4);
       
select * from ncr.decili        
into outfile "C:/IT/report/nimis/decili_20140708.txt";