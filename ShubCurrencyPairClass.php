<?php
class CyrrencyPair
{

	const CURRENCIES = ['USD' , 'EUR' , 'JPY' , 'CNY' /*, 'GBP' , 'AUD' , 'NZD' , 'CAD', 'CHF' */];//72 / 4 = 18

// To get keys use  apikeys.js , past here as array
// after execute function to generate ips and past in ips array
// Max 5 calls per minute for one key
// 2 CURRENCIES need 2 calls , 4 CURRENCIES need  12 cals  etc
// need keys = (60 / $cache_timeout)  * needed_calls
	const API_KEY = [
					 '1RIANMITXCLV8551',//1
					 '2L99VW61E11HRH4P',//2
					 'J444ZEI3GKZK29TC',//3
					 'IRDZLALK98LV9UDV',//4
					 'HAW324NZVBXQKV8K',//5
					 '6VOO591IGHS3G38I',//6
					 '5FI3XYI9D41KOQ29',//7
					 '2W77GVH4F4FSNNMT',//8
					 'I23YYSH13ABSEZA6',//9
					 'B2D8VBCQAR4DTWVY',//10
					 'Y270IK4OSMQ4OU4F',//11
					 'HRUDHE6G25GGWK0S',//12
					 '1AMV6IO68QQNCU4T',//13
					 'N6CQRIDTYRFJ786E',//14
					 'CG7BV6930PV6KTM3',//15
					 'IHQFIH7PCQFIJWAN',//16
					 'ZFYVGCR4509DJOXT',//17
					 'P7SSML0TS8AN8KCZ',//18
					 '75E8JDLB2HDJF63T',//19
					 'WAZWCA7YKNZON6E5',//20
					 'MBD74R9HTOG7ZKK8',//21
					 'VDXE77SL7EVF0EZ6',//22
					 '6XYJ7R5VS7DECQ1H',//23
					 'YG584PJVC4WB2ULI',//24
					 '6IGV7H1ZNDRLUNKG',//25
					 'MROL64X4LLB8WGMQ',//26
					 'F8HJ50BBR4GJD9G5',//27
					 'AAX2PG7DECTUXR5C',//28
					 'Z6NGK2QGONXC0WL6',//29
					 '7PUA9TPMRBXPGSWO',//30
					 '9JYBIG6P4M7LF36L',//31
					 'WTW1D02NPEA8HD93',//32
					 '9XSBFSG52P5O403L',//33
					 'XOU219XNSJH82K5I',//34
					 'OED4UYVBILU4R80N',//35
					 'ME006ZHH5N1YBGUS',//36
					 '9AVQFYZ3BCH3Y2F5',//37
					 '6NZ3R3WH6NNPRZOP',//38
					 'RGTJH00VPICTB2F6',//39
					 'KKSHOYHD392U4JCZ',//40
					 'PZ5GIT5DKUITI43H',//41
					 'R3D4L92HHT8MPK8H',//42
					 'MZ5Q8XXUKW7E8FYR',//43
					 'A6FZDRFZ1S104YIS',//44
					 'CX741KVPD0SXODO8',//45
					 '4EDVRZJND9VIER52',//46
					 '75AZI5BC4ZYUPCNI',//47
					 'KLJG7BWHGKQCR717',//48
					 'W0RIFLU1WVTW08ET',//49
					 'AFBWKA5W1IZE7O94',//50
					 'WXBYRB9AQU05079F',//51
					 'Y0UGCBLGAYZYGP0Z',//52
					 'UFL8X4RUGZS36G05',//53
					 '0M88WYTKVFV7YZJ9',//54
					 'F8K6GZ9T9RFDGBUR',//55
					 'ZXP4WZ071AQJT38N',//56
					 '3DPFXOTDPWIC9ZAW',//57
					 'C3XZVUOZ4SLWAGRR',//58
					 'II71L1G7VSMDTAPQ',//59
					 'VDUZSTS8NALY02GQ',//60
"EMUT1NR66P1VR4Z5", "J3XLC2LCZE6VEA4B", "24MF24XN8NYQGS6W", "EY0G7ORAZD5SJEX1", "RWDHR55YSI8ITRRA", "X2E2UBXYI4FJAYFT", "ILFZ4EVJ95OSV799",  "2M475LX558BJADPI", "GVCLI3LO59IPL05Q", "KO7RMHXCFLJWYKRM", "XABMP06N2CCSDQAV", "LZY9DSBE3QKM5436", "CI4DGNOFV0VSD3FU", "NDKUIG9OJS1AO59U", "FQLPLM8DNPYTC95V" , "AXUJCLS8NKZNCRZM", "4QI65S6SORMDAVWP", "BJ07O7DXSS63VWTO", "7QYH3YYPGQSMEAQD", "ZE64JW5WZZHVRH58", "MZWH2XL7JWPMKUD8", "RO8XBXYMO8B4ENBJ", "URHGEPKUA87JEI9W", "QZYGUJAC5X1JZCRO", "H0DKMO9C6J0T31DZ" , "XL81WFMKGXW9G2W9", "TZ1XN7N2EETUAJTU", "8CYZ0Z3P2CNIN10E", "H5QO3RRBF63E6QTP", "ZE9WUVE4N9UH0PCY", "PRK7IIGYKX11UF6W", "LABZAM8ZQB0SEHBF", "HCXLQR9JW7E047EV", "5DJT3XBKOJPPS5DN", "10SD680V453J3YNY","Y56E5LO5NBCZRM8F", "6GZVH08PC6UICVBR", "02ZBEDB64C3UMIJ9", "J5CBD2XYBWKS4WGO", "XQDPIYW1I3S646AJ", "46IN77GVMXAWIMFS", "19987M4SITTWCEQR", "VAR7MEVCW9AJK9W1", "H50KYV39PYLBWXDI", "4C4CDQCDG9EU00XP" , "SAGQ7TX85BMNXFWL", "F9KHSIZQ2DIO2XBR", "93R64W802MNMVCUI", "3UBS451BEEFD739Y", "N5LVRWHKGQCTGPYH", "OTN593DEIO9OMD79", "F9T2P07ASOUN1N76", "7B17K0DAV1SCXI28", "8V9B7ISML06WI9KS", "GMSDJHJRUY733EN9" , "B1NV5R9NEK8VTEGN", "FYIAIQ35XFVRX8CR", "D7VF2AND6EN8AEU6", "VRWEHC7NVJJ1CLHQ", "C68SGFUFLM33VTPW", "DI3LJWJR7KC7II1F", "7XYZ63EPQSOEO59W", "9SAY8SF16ZJIHHM7", "A94V88ETLQE3E60Q", "R1XJMR2541B9EJIC" , "N3ECOHXNUM22MWTR", "7B20DXPY5H1UFYGI", "MLZHMGO83NRRSL99", "P0CK04ULFO8Z0T5W", "UF4XLZBNLXGOUUUA", "FQLFLLUO481MAHCD", "0FPRHOJEU6GW3KE8", "GF70JZXQAYTEXK3A", "CS7VWSLNKFJPD8MV", "P0S3ECSJT37O4S3O" , "XPEYWK74QJ64HNMS", "MSE1OU2AB6I7BS1X", "Q62SMA98F024V080" , "IR31Y829BTFPX250", "S1XTWJTOJLFP8F7O", "E79JG6Q64S90Z5CN", "5IKN792N9V0WUL69", "NTBHCS4LPYU6YTJS", "TKUUCGKLW2D8C6Q8", "14JD1YYRKKLTF089", "W1CF7WW18TZ6OWHD", "DHXF9TZ4OH3W6W2M", "1KJ1LWCVE6HDQZ1P" , "L0WXQ1V1UJJKQH2T", "8PIQJN5UE7NYW662", "CXFCIV2Q8RETN6Q8", "VTUBL5C2A4VLLG4Q", "RL6U46C8Z6269BI3", "DJ4P9D55TDZVGCJR", "R73KKPH1KDU7CTPZ", "18055IG6PN4AQIB1", "INZXQ8YXKFXO6URV", "0YV0YBG98O8ZF9DC", "VYWF7NZPWHETTCHX", "92YPOCVGB13PX406", "RBI0F19UNSASAXHT", "OEZZ5P1YTINWZ2QO", "FT174WG8ZKFRXIDN", "7DZ6J884TMYEPW8O", "RQ9UEO9JI3SMUJDW", "UOYJYPGFGVPSPWRN", "AJXEL49PZPJUX3L4", "LPTJQ6T08977ILEY" , "E7PG9KCKCNDW1VMY", "5R94TB00IUQODAOY", "JINFPKVWFM667VO5", "5PD8SEEALT1POI12", "BIJTL8BC9U5MD620", "U1CCM742X3O3Z5T9", "CNAU66SXT3KGOKMU", "KJ79EFMG30GL6SWV", "B15TZANP6YMS8XYO", "MJU17X37AXRIZV42" , "UDI7PAIMKI6NSOOW", "HGXV5860KR3UNHZO", "QC4YMEQFPWN4OZH7", "QBJKHX1CBYK0CW4Y", "3PAEUP4I9OGKOZG0", "DWZO97IQPS0UOOS9", "NHDUTLSU9PUYV50Q", "LS3MYOKIQ7W9UB4B", "8H4VYC2VZHLFAHXI", "ML51RNUNYRPUH16J" , "DKK51M62T8EHFJD7", "NNXS2KLON59G8AKB", "JVWZU6AM3AQD35AJ", "Z82MKL6P22B9XODM", "AT33YA5YC56RIBQU", "51QYTBTY5561TS1O", "M7Y6Q1VBLXO9ZR6N", "7KPN8W992OQ5TE0Y", "ORTSYWWGBXYP3TX1", "8FOFSP5ZFJ3287GC" , "0VP6EZ44B5LEMRK8", "RV2EXJG8C1Y6756Y", "4JBSYGU4PGLCN3VV", "UQI5WEDCSAN1CVSR", "0AD0MTSKZ54XYN5M", "W36PSVU5XYHCKCCT", "XV5LZ3F0ZMP83I5R", "NWV3UHD876B5GZFU", "ME1AP5JKZQHZJXNK", "Z9MIX59YP1W58WGF" , "KSWZGDT5BFWR6GEE", "47XI36G8XEWMHPBX", "3CIP3728ZARQY4AR", "CGO97T32BOJLTXED", "1ZSVMDCECEJUABZ8", "GYPEJ6P118NCTG4S", "WCRKITIKQ6DADE99", "2T276HB6Q1OPZPJO", "EHQRCCQXEX71TN2F", "WUZLR780AQJM8OMY" , "G6QODF5HLCQMH557", "KKYN6Y5Q5G6FKTD1", "H64QVXNVSU67B1WV", "BMCSEW2GCAVHQLDF", "RMDWAN1L0M750WA1", "5A5NJEMPO3LM0PN3", "X0IFZXYC9WZCJF92", "VOMVKGMN8WCR7ZAF", "ND575GA8JLW6Y8R1", "TVPPUFPPRD5EYRVU" , "HONTSVTLAG8KWSX8", "RIPCKL2PM8ZZW2S2", "MH7G8CRO5TCZONGI", "RO35RSNJK0PP7V20", "CS5QKITUE4NUGWOK", "1CTKAL4QF9AJOOV2", "3HSWWN16LX0ES36T", "D1AMI19IXKXW95V0", "K4N5I2B3VF345AJY", "7TIU1JJBMU4VVKRW" , "NP9OWF16IJK7MDCH", "EAG7EW8OG6T7SC9T", "N37CR3YYYS3RA39T", "PT98F9SOEZ8XHYQU", "0TRCJGLN0D44GD0J", "8SQJ9ZGJ9FWVKS4I", "HAAVNN0WYVRAFJTH", "PDXJCWTB36SGEV13", "0Z03D21P0Q2ET7RR", "L5O4GN8NKBDLI919" , "OK3ZK5ZRD42JUP2S", "M75BGTZYRCH94P1X", "F126AF6T1Z0QSVRT", "XLUP08WKFKNT1EVH" , "3A0YXYM5JTO9529D", "6HKSX9CCBCP179EO", "WWUUNEWFS3D51R3P", "JB92WYDG98SJ76VM", "Q97NSCV61XI127JS", "NFB3460ZI8N8HCZI", "EUTIJRR32ZQFB13Q", "235RBOO9EVEJHDZO", "STHFFG9MFW42QI93", "DWRBSD1A6K9GN5J3","1SA0UFRNNG5TSV4N", "L8C7JS82HLHZ7FZO", "LKJHE8MF1KEEXX77", "6PS0ERG43ABK1V4I", "G98NDCY3ZCI2DJQE", "PUMKE2RSA553RXB5", "LHI2MG6Z1LS4SDXW", "9SCYX569CCQLAH4P", "IUMTX35VIOHPRY38", "5BUNK943BAS21RS9", "C9RFW9XLDQ6T2GTO", "PDLW5S5TIT3W14IE", "ORK3UBHBRNLEZVK8", "9DFP4FGBQJ5PL46M", "JIZGUBCFMCD2AOF1", "LB4TOTXQJLNKB6B3", "AJILT2K63J8PJ28Y", "K9A4W0O4XZBSEESV", "M58WYBU4ZM0GOKNI", "3738WB0JEVVXC7WG", "996LPKESTGFI8BZ2", "C3M45KM3TT6NKFPU" , "QO1LS3H7I1UFVVZ2", "QHKK2KSAKAVNWAYO", "LNBKNE0OSH92O2DT", "4TOJ3JS27XE2K6ZX", "CTQ39W2SCO3Y1FRW", "FDPRB3AXUPMP7DCX", "G9MWRX7AK6YOUV4J", "I68OCW8NUNUWPJKW", "3O0WWG1A1MHNTM1M", "CDKEH9SHZTBM5JR8", "P0KARCDTMJCGSYAL", "UAXS2UFI6PJGJCPU", "JJ5CBH6TV498ILDF", "1FQ4K7AQ0UNWY0N7", "O0PKA6NWOTWXFDC7", "UCRM878JTHFJJUUX", "7LKM7IMXK2GD8OMG", "7KV3PSQ8OB1EZNQ9", "MTQJJ9XRUPCCS3D9", "E48761X2Z6DUSRKK", "JYMTXXSA6CNAFY92", "0CCR9XRKA2X4C2X4", "9RIO38LXDP3VWE1Z", "PLLQ4C4PPHMM4QEF", "X8RDGOVLOSJ0E9G5", "1YLF76NAUR1CD5CC", "WC355DRT8PB4H5JY", "P6UDOT81A2ZZF2KZ", "CSKH2CGIIOGX6FAK", "KSOA25MG4LVGMC4M", "8ZRUP9H1C9TTX7O6", "SN1AVI8GDH59H3FC", "HBCLULCXOLSRIBEY" , "2NVU9UM9XS8VLJBR", "Q9HER9Z97YV4YZW7", "TRT9RB1KUIO3Q9L9", "FTWIP0O0I7B1BFAC", "N03YILE2ACKZZF37", "03UWEIYZQ324372P", "P409DJ4X70FBB9WN", "E1DNGDF6DXQMNYP1", "YENT27X72PL439O9", "65MT375QPZD8C2PD", "GXPCS4A7B8Z9WZ5D", "J261AZ3B50V6M6E2", "0K4HK2RFH2DDCW0C", "WZZNQCYOV8CSI901", "IL12B1LA27Y8N7O2", "I2XH1Z2IXSEQJKI0", "2YRWQOGN5XU2EZ0D", "6QX6ML0G4LKZYO83", "DZIJY1G4XM9QUC82", "MGSL543AWEY4O2WL", "0UC22MGE61T7097T", "JLLT3037QIIG2Q97", "3YHRPDYYGRGTMVY3", "6G2WZA646E4YCEYK", "IWO7Y1K3Y642SK9Y", "FU936FUANO9PTIXS", "H1T7PD4HOGQHYWNT", "QGNLP6P9RW34U2ER", "8UC7EM55VDMYFOWV", "SS96PIWR9I65ELU7", "WK3LL8T49NARBM0K", "DYAD07PDMRIUKU7D" , "HDC8ECUVM8XZ67CJ", "3QLHL8845B97GYZL", "D3IOZW1ZGQCKFMEL", "LVSOB4TXWOIXPHTP", "K3H0MMASVNVPU0VI", "BJCX2ZG3395CAPRZ", "ZFNQH0XY1DG8EN51", "QRVYQOETP5XZRUEZ", "B8XFAWA4ULYK008K", "DF4YXYY7LV2F0U7T", "LOXV5NN8AMGZPFCF", "AE25FGHF05D4KG4J", "MTQDEBIVRU26Y9C1", "9ND37KU3LKCAY7XO", "JYFYBC7XBUNOY7G0", "78YVN5DB039B9IJP", "9KKQNCRA1TX5SL5F", "PBN1ITAUJA58BDTT", "ECSIV145YZRXO3HX", "K4K62A7SV989XAON", "GQJKLLN3HIXWZTK9", "J0110IAGMTZ50JDS", "U0UVPBO1VSI3V9BD", "O7DR3VQXPECHYTBJ", "PTUCJFEH4OK6UHNT", "4CL27ZRY04JDRN2B", "9NPZ3LTUWSKB6ENN", "0R4JCV7HKLU0N4XM", "O65VBQVJ0S7WVGVR", "Q086K2FGDF7C0PCR" , "ZH1NFKLQ6MPMM4OH", "23G75KHHXL3BSN1T", "B0BCGUA4B3FY82AA", "VM2CLGF0RC5DX6TP", "TFT46NL7BFE66G1M", "74RXNZ6NQTB27IA3", "I4MWDTW8XE5L5Z5X", "WQRG306FHN27OTB8", "OL7YHTEKDETNPUJJ", "NT0NQNO4RUD4TYVE", "Z5TAQJOBJN0Z7XXA", "IO7JPKKXL5E94BMH", "ZZ4P9W0LTXSKFHMZ", "970AY3K08EXHGYPI", "QK7N8MI4XJ6Y9DE9", "XUF63Z0BV11QLHWP", "NASD8GR592DW1K1Z", "ZZK8ZORDVIGWW1RA", "6OU94AR94ZOSO76K", "XT88SU1F92NDDU1Z", "G7282PQBZKEVSD7Z", "VH23I2DFTSK9BJD3", "6LEX9BMFUIHTLMC8", "FO73SPZT9C6DW3P4", "TP9B19MCHP8LVXZQ", "8HZFT63F2N5A8P0G", "DG4YMRKWB5OYD061", "8DRVQ7NJC43Y789Y", "VX6QHD6XOI1BZ8S3", "KSX8U4P7W46DMTG2" , "J4YBZWS9C696LVN1", "YV6JBZ3P5560ZVQY", "ZASBRA2GACX2RU6Z", "C434554L6Z8DH3TX", "0AZTS5AF8ZMTY7VC", "T8WDQA6UZN50KPH2", "FJAIEUU21PY42SY3", "KLUMZAS1F28SEXA9", "6A9RUCL1MAYC9HH1", "OLHRI20N864R0O96", "N5MIWBPZZAGXS063", "EX0NC7KBCHYVNCZA", "UZRE9GTNXQO547IG", "6W6ZQVY89S9UESKR", "RFXAOUK92SWS8GXL", "FUJCFRE14C8UTNNL", "HTU8J5UZL8WM3V32", "9PS262R6U5S11N6T", "RTJQH8HW7D7TVS5G", "57EXBWCMQ0B0E38Z", "16SYVGF6X8ST7449", "BHE010K7UC40PX0W", "0ZK8C1XWPX0LFO26", "S0M1C6N70ULLFSUO", "DFW2EO4P31NWL6H8", "COV8BMWFOUOWPRCX", "ZQIUG9ZSOHIX1H4B", "N3GMQUKIKD4JT9SK", "Z5K36517MN69NZIH", "7H8RVALASDTO6SHL" , "K4GLLE4J342NVKEL", "DHFINJISDTCYVLYB", "VI1XHXZBTG82YE0Q", "PJTVFNFYQGTL643W", "EI8MY99NQ5FLQAY4", "RXVKYN9I4331XHV7", "5L9NK1X1UUKMNKON", "5V5EN0TGPU1TUGW1", "Z3M8JZI1FFGKE5Z7", "AG5MO6BL4TWGM2US", "KTTYJRLY9R69MSGG", "7MZK56A4FTA8ZRHD", "D8MFBCDUAD2P7SSG", "17AI1B87Y31ZL0NH", "6Z23AR0XONLPL5F1", "C7XYQT88O36HGLCD", "H7F4GQVYFG4576RB", "1SGYBJECGRX5UC2U", "F4J3JJX19CA83QWD", "OLD84Q3K29Z7CG2M", "229K3NENTFX7Z9AS", "NIZC6APNZ70VDDV1", "4K0J09V7CRM7VXUW", "5F94TS1Q8W6PPFGL", "WGLGY7ELRZH9FOCM", "RGQ92NEM4PPNAXHI", "IJXS9MSRNGR2I6QS", "Y40Q50MOF1ZUE392", "ZV3459UOV7QBBGSQ", "OV3R9X44PZWKSV01" , "SM5XMOFM8VQMYP51", "0L10Y8UI1Z5NHDFD", "PXS91DITHGGR2VOD", "TOVS4YE4A70NMBZ1", "DPUHNWKO1K9HFOSY", "HF1KPPUQ6PGVDWJ5", "8ESG3GP7GTD8M1XP", "57EYS016JGFV9K8C", "000PT1KYFDXY4RVV", "RLTCMNUN6QRMAVH9", "LG9IS4IYWAM6AZBI", "Z38NRNZ9FMWV64GP", "0QD7ISF7OBKKE80B", "2EXCKZ4KBNVQPBK9", "JPTCBA6YWVPDNE3I", "ML4P02W6MFTT0E43", "FOHE2Z71WLS62DY1", "JHRHEFDFW5RJ720F", "E8NQWNN77NB6VC7J", "REBSRJ1Q0JOAWJ9A", "PUB5G3MRZNCHQF8Q", "4PKNC6BK711JVM2M", "9GMR7L3V9E5NW8MF", "1S7KOT6S7RVKP0SS", "HSSMXG5QDM3SDA7S", "MBE2ROLJO9OIOE3T", "3WLU553NRA0J7E4N", "E69C39ELRM9B2CDC", "J4410RZKCO6MY8KK", "W4J72KNP417BNOUJ" , "WNM7ND6DTY1FBBQC", "B1W0BYLRNJH7FJOW", "JVBNQR24R9JCHECN", "7BTI8OSIZAFB8PLA", "FFKWA6VQLPPY3LZD", "KN6XO2EW0HLHN01M", "HQLCYGY6ED3CNGKR", "YN1ZJU5M390M1QAS", "UZ0AXAJ89S4E8RUF", "07BIS19NIPDIIY14", "0HNOJ04FM0TJ0U69", "F3VC8EETQD07DUOF", "QQPJ0BLUA7IKAEA4", "7MGDJK17JU4JTLSD", "1KRZ1U4TBIEZE2EI", "409EFFH3KOWYKZJ1", "CX5RDRQ06QI4ERZ9", "Q34XEFC7XV84UTF6", "7M0CHY1OUMWO99VA", "52QUC3U3H1PNRZCQ", "I3MZZBNR0G575PW0", "EJS9VU5K5B0IS8C7", "2EPAS9WIQIV8CNCY" , "T9UHLZ1TEXEN608W", "7DUZEPXHICA6U24A", "NP6LRGXGY3HA47VU", "VSQ2O6UNADCYH0X0", "L6K2FZ1P6PE6XQ1K", "UK89DLUVNCMNOQ77", "D6A00ZBR612RK6XH", "9FMKVQDEOME693WS", "KYFRKMK1CKDCW0TB", "LEW4ZCWJUTWAHEM1", "RF3YPUCKS8AKXBTN", "G33I08W3I0AS4WJU", "51PM79N8GLKJ7RUY", "OHHHU6EAAI1INFOA", "PDHG8DGRVSP3IE25", "R55MWW1PWD72IH1J", "IKWTBQ1O6Q6X6327", "03RIPJR1TQ6F4AA2", "F2P5UHMXYFKIVC5K", "0LYVZPZWMAQIIKFY", "9SRK27PIPJO5GXJI", "A9LVR7VILJF8SQHS", "H6P7ZSSHUVKPJWU8", "3QNAHNP9JTTIBPRD", "98R9MHLEHGX1JSGQ", "YXUNNF3WD9IU8A65", "JWMKY5W74TG6VBOD", "03FVKKY5ZCM8CVWP", "T9Q3NGW5AC1Q8G56", "WYDRQ2OGFA9PKX2R" , "TY2T8B2UXI02PTS7", "KJODIX2P3GZ15TTG", "Y6KRD0HR1EWUGUWN", "ROBVKIP4ZIO4NB3Q", "8WU116FLW44JN1R4", "JJJNWEDWFP6JJUD9", "SW6PQDBNYKKF7W5R", "J884R2G0HVV4QV6A", "2FFRVCXZ4VQMZ6VH", "CCRF3J00Y6O87IMB", "FWZD09L0UGROX4XP", "5O520YZ5BG5V6SPV", "B2IFQ9RA3KLWR6RH", "TZMHH5PENSX46OJC", "EAJJ5VOHTOOAUPDV", "D7Y21YR210LCQGGA", "TCB3T4AC7K1JAX10", "FTV89BG7E5866U2T", "BD1EJLXQE7EDMUTQ", "RUOJFQK6XULMNEG4", "2CYL8C8T9CNU5J00", "6HL4558WQKHDQO6X", "LRDTEDMXK5XGT7BJ", "GU1642SADV5ZS6WD", "9SWKM2IZ27BBSJ5I", "OG6BFKTEC66PCQ8A", "E0VQK0WILYIG3KQK", "GGGZJ6BM4I0A461L", "DJ3LGIMCLHWYSN5V", "RHTILJLC8TSPJEK0" , "NK8RORVSWLP25ITY", "E4M6DR5KCOTQ0RDJ", "H4ZQBJFKE2Y1X7RC", "HR4B9XLWG3HY8DP3", "W9GMWL0T6EBR6APR", "9PSXWKW6PV6CLV9G", "MGXWW7SXJLUWBUNY", "Y41VDHUXFD8IHTVM", "9U8SYEFV344TBQES", "D8ZJGJC8OP6OE5EC", "BXPUZZ1L5RT2CHVL", "POFKOBLC2OLDGMOT", "KIL0O822ED982CIR", "ABBIWFP7I4SDH5O6", "A1IL76IMYOS8CP26", "RIFR2JM8HFWS27VN", "GZ04ZCJ581FQ2HHQ", "C12V74ZT2Q9I7CNY", "8MX93Q3EUDAZVEQV", "RDBIBR0SRLVDCUHU", "73ZZR37HQZT9AEUF", "4ZVFWZDMIWEQTKBJ", "3VIIINPNN4PEUUT6", "ZGR65ZGOIHP78D1D", "U36TDH5UFQLK58FI", "79N8L4L5TB9H7TIY", "9E25BMG3AHFSV0MG", "TGAFEC1I5E40LMDL", "487X322OD176TERP", "HFY1BQ33GHJPDWMC" ,"CN11OCAC454IRZFI", "H1XY6U6JDVAECHFA", "LT0EBLC4TD35BWB7", "9DYAA9ANO8WEVBSY", "EVCOHDGY00HCO932", "NLJF4UID6100Y15C", "NHQGV77I50ONV2NQ", "SYJYVHFUR87LCWS6", "RC1FY0B7DEFBJST5", "BSCNZB914HQUUZ4B", "ZS4NJGFCX6PWLEUX", "U19X4KQET04P0G5W", "OE3KXOOSF23XE2T5", "33OUGXW9G7Z5DVLB", "N1CCOAUQULHLS1JV", "74TEMWDRCZ2SZ1KR", "RCIN5FWU694QCPF8", "QCUCZMHWHBWA5EGT", "9D8GI34F9CMQ09DU", "OE5OJEEO6EASHC52", "ZYVZBSA5JKPI0888", "NEOOCZRCWG0PUXDO", "Y6PMT32DI27ZX7RU", "HL3GA1QRTCK44I35", "JWHNT2DJDVT2LPUP", "MVPV9GJQC0Q7RCH4", "JGBDJ5ZBARDKA0PE", "C3ZZZMQ2W2AHQQ5Z", "L3UA1PK58ZSV1EFN", "6INZ7Q1NI9KNBM75", "HJBQ7X6KUGGYI8PV", "X5DGWUMZM7KPPJ0T", "PO7976OGSPVIZBNH", "EK04DEVCNBERYSK4", "0M539GN9RO2D9WJ8", "IGYNWG01GO6T8T44", "GLH5ARMYNEXF9XXV", "07HLG6QLJDA3G1NY", "G5MO9HFDKHZEJTAE", "T1KNA4MLPF4DJ85Z", "XDBD2TRZDTK48YYA", "6GKEKDOGB3T15LWO", "ZEGZKDBSP1D38QK1", "HIKUNUD342YCHGQV", "X65SOWTCD9EJU1MB", "5BUM8O3XHAK41AD0", "Q6N4PEVEMILDHHUV", "U6ZTZ99T7J72CJJK", "WWES47IVIF6XTLM6", "OKSLG47S4RAIG8XJ", "V0H65K6JOCBKCZDR", "YOJ02H6KTVK7E6TZ", "0CP794PSRBWHJ9HV", "DUCFI94XMKK26FRL", "6JBBUNMS4WK6WIG8", "AIWM4SA2FFOVRJVY", "HLMIUUCGNFEQJVT3", "K38O3S8S0IUN58M0", "EF4LQFGKRYJAIMYC", "TYXZD0HO1BUAGL3T" , "I4EWI8O3G41ZSU2C", "MMQ5CIV2KNWD4PM9", "I75H7BHE2UBB9AE1", "S4GC6DSF5ZPNJLU5", "7D74GJJ0G346DV61", "4DU62HYCSYCNTDRD", "6DGYJP3JU3WBI7OQ", "HNGXRNH22BIKU8UQ", "ATPLUNO6GYPHO0RT", "BX6ITP8RUYJJ6T40", "S0RI1L5QL2NW025L", "FOHIEW2YGC3TKPAM", "OD118L5FB95FNPNA", "PYSK32DAXS5I0H12", "5R22162I8UTM6QZK", "DRTYQBF8M6HG3NWX", "NAF8D7HG2LU9HW9L", "91TNKW3V1SXDHL2R", "R21V9JY6FWSMNJ5Z", "7JJ7ULS0QJPCKFZH", "YP7KSE3XOTNGX8IM", "UV1I81HN4G25BE2R", "L5SJAZPARWYDD497", "1V63GRYQA3ULNKKC", "HS8P2RMF7V0VDV24", "1QR9GST5SYISO5HH", "AUNFN6C699GLUAS9", "FXK08L3463VF21LR","9Y2EP9J9KFBMW3KG", "Z617L9IN2P3VIWPF", "ERHSSLA6PF3ERXQU"

					];
	public static $ip_adresses = ["1.0.0.0" ,"1.0.0.1" ,"1.0.0.2" ,"1.0.0.3" ,"1.0.0.4" ,"1.0.0.5" ,"1.0.0.6" ,"1.0.0.7" ,"1.0.0.8" ,"1.0.0.9" ,"1.0.0.10" ,"1.0.0.11" ,"1.0.0.12" ,"1.0.0.13" ,"1.0.0.14" ,"1.0.0.15" ,"1.0.0.16" ,"1.0.0.17" ,"1.0.0.18" ,"1.0.0.19" ,"1.0.0.20" ,"1.0.0.21" ,"1.0.0.22" ,"1.0.0.23" ,"1.0.0.24" ,"1.0.0.25" ,"1.0.0.26" ,"1.0.0.27" ,"1.0.0.28" ,"1.0.0.29" ,"1.0.0.30" ,"1.0.0.31" ,"1.0.0.32" ,"1.0.0.33" ,"1.0.0.34" ,"1.0.0.35" ,"1.0.0.36" ,"1.0.0.37" ,"1.0.0.38" ,"1.0.0.39" ,"1.0.0.40" ,"1.0.0.41" ,"1.0.0.42" ,"1.0.0.43" ,"1.0.0.44" ,"1.0.0.45" ,"1.0.0.46" ,"1.0.0.47" ,"1.0.0.48" ,"1.0.0.49" ,"1.0.0.50" ,"1.0.0.51" ,"1.0.0.52" ,"1.0.0.53" ,"1.0.0.54" ,"1.0.0.55" ,"1.0.0.56" ,"1.0.0.57" ,"1.0.0.58" ,"1.0.0.59" ,"1.0.0.60" ,"1.0.0.61" ,"1.0.0.62" ,"1.0.0.63" ,"1.0.0.64" ,"1.0.0.65" ,"1.0.0.66" ,"1.0.0.67" ,"1.0.0.68" ,"1.0.0.69" ,"1.0.0.70" ,"1.0.0.71" ,"1.0.0.72" ,"1.0.0.73" ,"1.0.0.74" ,"1.0.0.75" ,"1.0.0.76" ,"1.0.0.77" ,"1.0.0.78" ,"1.0.0.79" ,"1.0.0.80" ,"1.0.0.81" ,"1.0.0.82" ,"1.0.0.83" ,"1.0.0.84" ,"1.0.0.85" ,"1.0.0.86" ,"1.0.0.87" ,"1.0.0.88" ,"1.0.0.89" ,"1.0.0.90" ,"1.0.0.91" ,"1.0.0.92" ,"1.0.0.93" ,"1.0.0.94" ,"1.0.0.95" ,"1.0.0.96" ,"1.0.0.97" ,"1.0.0.98" ,"1.0.0.99" ,"1.0.0.100" ,"1.0.0.101" ,"1.0.0.102" ,"1.0.0.103" ,"1.0.0.104" ,"1.0.0.105" ,"1.0.0.106" ,"1.0.0.107" ,"1.0.0.108" ,"1.0.0.109" ,"1.0.0.110" ,"1.0.0.111" ,"1.0.0.112" ,"1.0.0.113" ,"1.0.0.114" ,"1.0.0.115" ,"1.0.0.116" ,"1.0.0.117" ,"1.0.0.118" ,"1.0.0.119" ,"1.0.0.120" ,"1.0.0.121" ,"1.0.0.122" ,"1.0.0.123" ,"1.0.0.124" ,"1.0.0.125" ,"1.0.0.126" ,"1.0.0.127" ,"1.0.0.128" ,"1.0.0.129" ,"1.0.0.130" ,"1.0.0.131" ,"1.0.0.132" ,"1.0.0.133" ,"1.0.0.134" ,"1.0.0.135" ,"1.0.0.136" ,"1.0.0.137" ,"1.0.0.138" ,"1.0.0.139" ,"1.0.0.140" ,"1.0.0.141" ,"1.0.0.142" ,"1.0.0.143" ,"1.0.0.144" ,"1.0.0.145" ,"1.0.0.146" ,"1.0.0.147" ,"1.0.0.148" ,"1.0.0.149" ,"1.0.0.150" ,"1.0.0.151" ,"1.0.0.152" ,"1.0.0.153" ,"1.0.0.154" ,"1.0.0.155" ,"1.0.0.156" ,"1.0.0.157" ,"1.0.0.158" ,"1.0.0.159" ,"1.0.0.160" ,"1.0.0.161" ,"1.0.0.162" ,"1.0.0.163" ,"1.0.0.164" ,"1.0.0.165" ,"1.0.0.166" ,"1.0.0.167" ,"1.0.0.168" ,"1.0.0.169" ,"1.0.0.170" ,"1.0.0.171" ,"1.0.0.172" ,"1.0.0.173" ,"1.0.0.174" ,"1.0.0.175" ,"1.0.0.176" ,"1.0.0.177" ,"1.0.0.178" ,"1.0.0.179" ,"1.0.0.180" ,"1.0.0.181" ,"1.0.0.182" ,"1.0.0.183" ,"1.0.0.184" ,"1.0.0.185" ,"1.0.0.186" ,"1.0.0.187" ,"1.0.0.188" ,"1.0.0.189" ,"1.0.0.190" ,"1.0.0.191" ,"1.0.0.192" ,"1.0.0.193" ,"1.0.0.194" ,"1.0.0.195" ,"1.0.0.196" ,"1.0.0.197" ,"1.0.0.198" ,"1.0.0.199" ,"1.0.0.200" ,"1.0.0.201" ,"1.0.0.202" ,"1.0.0.203" ,"1.0.0.204" ,"1.0.0.205" ,"1.0.0.206" ,"1.0.0.207" ,"1.0.0.208" ,"1.0.0.209" ,"1.0.0.210" ,"1.0.0.211" ,"1.0.0.212" ,"1.0.0.213" ,"1.0.0.214" ,"1.0.0.215" ,"1.0.0.216" ,"1.0.0.217" ,"1.0.0.218" ,"1.0.0.219" ,"1.0.0.220" ,"1.0.0.221" ,"1.0.0.222" ,"1.0.0.223" ,"1.0.0.224" ,"1.0.0.225" ,"1.0.0.226" ,"1.0.0.227" ,"1.0.0.228" ,"1.0.0.229" ,"1.0.0.230" ,"1.0.0.231" ,"1.0.0.232" ,"1.0.0.233" ,"1.0.0.234" ,"1.0.0.235" ,"1.0.0.236" ,"1.0.0.237" ,"1.0.0.238" ,"1.0.0.239" ,"1.0.0.240" ,"1.0.0.241" ,"1.0.0.242" ,"1.0.0.243" ,"1.0.0.244" ,"1.0.0.245" ,"1.0.0.246" ,"1.0.0.247" ,"1.0.0.248" ,"1.0.0.249" ,"1.0.0.250" ,"1.0.0.251" ,"1.0.0.0" ,"1.0.0.1" ,"1.0.0.2" ,"1.0.0.3" ,"1.0.0.4" ,"1.0.0.5" ,"1.0.0.6" ,"1.0.0.7" ,"1.0.0.8" ,"1.0.0.9" ,"1.0.0.10" ,"1.0.0.11" ,"1.0.0.12" ,"1.0.0.13" ,"1.0.0.14" ,"1.0.0.15" ,"1.0.0.16" ,"1.0.0.17" ,"1.0.0.18" ,"1.0.0.19" ,"1.0.0.20" ,"1.0.0.21" ,"1.0.0.22" ,"1.0.0.23" ,"1.0.0.24" ,"1.0.0.25" ,"1.0.0.26" ,"1.0.0.27" ,"1.0.0.28" ,"1.0.0.29" ,"1.0.0.30" ,"1.0.0.31" ,"1.0.0.32" ,"1.0.0.33" ,"1.0.0.34" ,"1.0.0.35" ,"1.0.0.36" ,"1.0.0.37" ,"1.0.0.38" ,"1.0.0.39" ,"1.0.0.40" ,"1.0.0.41" ,"1.0.0.42" ,"1.0.0.43" ,"1.0.0.44" ,"1.0.0.45" ,"1.0.0.46" ,"1.0.0.47" ,"1.0.0.48" ,"1.0.0.49" ,"1.0.0.50" ,"1.0.0.51" ,"1.0.0.52" ,"1.0.0.53" ,"1.0.0.54" ,"1.0.0.55" ,"1.0.0.56" ,"1.0.0.57" ,"1.0.0.58" ,"1.0.0.59" ,"1.0.0.60" ,"1.0.0.61" ,"1.0.0.62" ,"1.0.0.63" ,"1.0.0.64" ,"1.0.0.65" ,"1.0.0.66" ,"1.0.0.67" ,"1.0.0.68" ,"1.0.0.69" ,"1.0.0.70" ,"1.0.0.71" ,"1.0.0.72" ,"1.0.0.73" ,"1.0.0.74" ,"1.0.0.75" ,"1.0.0.76" ,"1.0.0.77" ,"1.0.0.78" ,"1.0.0.79" ,"1.0.0.80" ,"1.0.0.81" ,"1.0.0.82" ,"1.0.0.83" ,"1.0.0.84" ,"1.0.0.85" ,"1.0.0.86" ,"1.0.0.87" ,"1.0.0.88" ,"1.0.0.89" ,"1.0.0.90" ,"1.0.0.91" ,"1.0.0.92" ,"1.0.0.93" ,"1.0.0.94" ,"1.0.0.95" ,"1.0.0.96" ,"1.0.0.97" ,"1.0.0.98" ,"1.0.0.99" ,"1.0.0.100" ,"1.0.0.101" ,"1.0.0.102" ,"1.0.0.103" ,"1.0.0.104" ,"1.0.0.105" ,"1.0.0.106" ,"1.0.0.107" ,"1.0.0.108" ,"1.0.0.109" ,"1.0.0.110" ,"1.0.0.111" ,"1.0.0.112" ,"1.0.0.113" ,"1.0.0.114" ,"1.0.0.115" ,"1.0.0.116" ,"1.0.0.117" ,"1.0.0.118" ,"1.0.0.119" ,"1.0.0.120" ,"1.0.0.121" ,"1.0.0.122" ,"1.0.0.123" ,"1.0.0.124" ,"1.0.0.125" ,"1.0.0.126" ,"1.0.0.127" ,"1.0.0.128" ,"1.0.0.129" ,"1.0.0.130" ,"1.0.0.131" ,"1.0.0.132" ,"1.0.0.133" ,"1.0.0.134" ,"1.0.0.135" ,"1.0.0.136" ,"1.0.0.137" ,"1.0.0.138" ,"1.0.0.139" ,"1.0.0.140" ,"1.0.0.141" ,"1.0.0.142" ,"1.0.0.143" ,"1.0.0.144" ,"1.0.0.145" ,"1.0.0.146" ,"1.0.0.147" ,"1.0.0.148" ,"1.0.0.149" ,"1.0.0.150" ,"1.0.0.151" ,"1.0.0.152" ,"1.0.0.153" ,"1.0.0.154" ,"1.0.0.155" ,"1.0.0.156" ,"1.0.0.157" ,"1.0.0.158" ,"1.0.0.159" ,"1.0.0.160" ,"1.0.0.161" ,"1.0.0.162" ,"1.0.0.163" ,"1.0.0.164" ,"1.0.0.165" ,"1.0.0.166" ,"1.0.0.167" ,"1.0.0.168" ,"1.0.0.169" ,"1.0.0.170" ,"1.0.0.171" ,"1.0.0.172" ,"1.0.0.173" ,"1.0.0.174" ,"1.0.0.175" ,"1.0.0.176" ,"1.0.0.177" ,"1.0.0.178" ,"1.0.0.179" ,"1.0.0.180" ,"1.0.0.181" ,"1.0.0.182" ,"1.0.0.183" ,"1.0.0.184" ,"1.0.0.185" ,"1.0.0.186" ,"1.0.0.187" ,"1.0.0.188" ,"1.0.0.189" ,"1.0.0.190" ,"1.0.0.191" ,"1.0.0.192" ,"1.0.0.193" ,"1.0.0.194" ,"1.0.0.195" ,"1.0.0.196" ,"1.0.0.197" ,"1.0.0.198" ,"1.0.0.199" ,"1.0.0.200" ,"1.0.0.201" ,"1.0.0.202" ,"1.0.0.203" ,"1.0.0.204" ,"1.0.0.205" ,"1.0.0.206" ,"1.0.0.207" ,"1.0.0.208" ,"1.0.0.209" ,"1.0.0.210" ,"1.0.0.211" ,"1.0.0.212" ,"1.0.0.213" ,"1.0.0.214" ,"1.0.0.215" ,"1.0.0.216" ,"1.0.0.217" ,"1.0.0.218" ,"1.0.0.219" ,"1.0.0.220" ,"1.0.0.221" ,"1.0.0.222" ,"1.0.0.223" ,"1.0.0.224" ,"1.0.0.225" ,"1.0.0.226" ,"1.0.0.227" ,"1.0.0.228" ,"1.0.0.229" ,"1.0.0.230" ,"1.0.0.231" ,"1.0.0.232" ,"1.0.0.233" ,"1.0.0.234" ,"1.0.0.235" ,"1.0.0.236" ,"1.0.0.237" ,"1.0.0.238" ,"1.0.0.239" ,"1.0.0.240" ,"1.0.0.241" ,"1.0.0.242" ,"1.0.0.243" ,"1.0.0.244" ,"1.0.0.245" ,"1.0.0.246" ,"1.0.0.247" ,"1.0.0.248" ,"1.0.0.249" ,"1.0.0.250" ,"1.0.0.251" ,"1.0.0.252" ,"1.0.0.253" ,"1.0.0.254" ,"1.0.1.0" ,"1.0.1.1" ,"1.0.1.2" ,"1.0.1.3" ,"1.0.1.4" ,"1.0.1.5" ,"1.0.1.6" ,"1.0.1.7" ,"1.0.1.8" ,"1.0.1.9" ,"1.0.1.10" ,"1.0.1.11" ,"1.0.1.12" ,"1.0.1.13" ,"1.0.1.14" ,"1.0.1.15" ,"1.0.1.16" ,"1.0.1.17" ,"1.0.1.18" ,"1.0.1.19" ,"1.0.1.20" ,"1.0.1.21" ,"1.0.1.22" ,"1.0.1.23" ,"1.0.1.24" ,"1.0.1.25" ,"1.0.1.26" ,"1.0.1.27" ,"1.0.1.28" ,"1.0.1.29" ,"1.0.1.30" ,"1.0.1.31" ,"1.0.1.32" ,"1.0.1.33" ,"1.0.1.34" ,"1.0.1.35" ,"1.0.1.36" ,"1.0.1.37" ,"1.0.1.38" ,"1.0.1.39" ,"1.0.1.40" ,"1.0.1.41" ,"1.0.1.42" ,"1.0.1.43" ,"1.0.1.44" ,"1.0.1.45" ,"1.0.1.46" ,"1.0.1.47" ,"1.0.1.48" ,"1.0.1.49" ,"1.0.1.50" ,"1.0.1.51" ,"1.0.1.52" ,"1.0.1.53" ,"1.0.1.54" ,"1.0.1.55" ,"1.0.1.56" ,"1.0.1.57" ,"1.0.1.58" ,"1.0.1.59" ,"1.0.1.60" ,"1.0.1.61" ,"1.0.1.62" ,"1.0.1.63" ,"1.0.1.64" ,"1.0.1.65" ,"1.0.1.66" ,"1.0.1.67" ,"1.0.1.68" ,"1.0.1.69" ,"1.0.1.70" ,"1.0.1.71" ,"1.0.1.72" ,"1.0.1.73" ,"1.0.1.74" ,"1.0.1.75" ,"1.0.1.76" ,"1.0.1.77" ,"1.0.1.78" ,"1.0.1.79" ,"1.0.1.80" ,"1.0.1.81" ,"1.0.1.82" ,"1.0.1.83" ,"1.0.1.84" ,"1.0.1.85" ,"1.0.1.86" ,"1.0.1.87" ,"1.0.1.88" ,"1.0.1.89" ,"1.0.1.90" ,"1.0.1.91" ,"1.0.1.92" ,"1.0.1.93" ,"1.0.1.94" ,"1.0.1.95" ,"1.0.1.96" ,"1.0.1.97" ,"1.0.1.98" ,"1.0.1.99" ,"1.0.1.100" ,"1.0.1.101" ,"1.0.1.102" ,"1.0.1.103" ,"1.0.1.104" ,"1.0.1.105" ,"1.0.1.106" ,"1.0.1.107" ,"1.0.1.108" ,"1.0.1.109" ,"1.0.1.110" ,"1.0.1.111" ,"1.0.1.112" ,"1.0.1.113" ,"1.0.1.114" ,"1.0.1.115" ,"1.0.1.116" ,"1.0.1.117" ,"1.0.1.118" ,"1.0.1.119" ,"1.0.1.120" ,"1.0.1.121" ,"1.0.1.122" ,"1.0.1.123" ,"1.0.1.124" ,"1.0.1.125" ,"1.0.1.126" ,"1.0.1.127" ,"1.0.1.128" ,"1.0.1.129" ,"1.0.1.130" ,"1.0.1.131" ,"1.0.1.132" ,"1.0.1.133" ,"1.0.1.134" ,"1.0.1.135" ,"1.0.1.136" ,"1.0.1.137" ,"1.0.1.138" ,"1.0.1.139" ,"1.0.1.140" ,"1.0.1.141" ,"1.0.1.142" ,"1.0.1.143" ,"1.0.1.144" ,"1.0.1.145" ,"1.0.1.146" ,"1.0.1.147" ,"1.0.1.148" ,"1.0.1.149" ,"1.0.1.150" ,"1.0.1.151" ,"1.0.1.152" ,"1.0.1.153" ,"1.0.1.154" ,"1.0.1.155" ,"1.0.1.156" ,"1.0.1.157" ,"1.0.1.158" ,"1.0.1.159" ,"1.0.1.160" ,"1.0.1.161" ,"1.0.1.162" ,"1.0.1.163" ,"1.0.1.164" ,"1.0.1.165" ,"1.0.1.166" ,"1.0.1.167" ,"1.0.1.168" ,"1.0.1.169" ,"1.0.1.170" ,"1.0.1.171" ,"1.0.1.172" ,"1.0.1.173" ,"1.0.1.174" ,"1.0.1.175" ,"1.0.1.176" ,"1.0.1.177" ,"1.0.1.178" ,"1.0.1.179" ,"1.0.1.180" ,"1.0.1.181" ,"1.0.1.182" ,"1.0.1.183" ,"1.0.1.184" ,"1.0.1.185" ,"1.0.1.186" ,"1.0.1.187" ,"1.0.1.188" ,"1.0.1.189" ,"1.0.1.190" ,"1.0.1.191" ,"1.0.1.192" ,"1.0.1.193" ,"1.0.1.194" ,"1.0.1.195" ,"1.0.1.196" ,"1.0.1.197" ,"1.0.1.198" ,"1.0.1.199" ,"1.0.1.200" ,"1.0.1.201" ,"1.0.1.202" ,"1.0.1.203" ,"1.0.1.204" ,"1.0.1.205" ,"1.0.1.206" ,"1.0.1.207" ,"1.0.1.208" ,"1.0.1.209" ,"1.0.1.210" ,"1.0.1.211" ,"1.0.1.212" ,"1.0.1.213" ,"1.0.1.214" ,"1.0.1.215" ,"1.0.1.216" ,"1.0.1.217" ,"1.0.1.218" ,"1.0.1.219" ,"1.0.1.220" ,"1.0.1.221" ,"1.0.1.222" ,"1.0.1.223" ,"1.0.1.224" ,"1.0.1.225" ,"1.0.1.226" ,"1.0.1.227" ,"1.0.1.228" ,"1.0.1.229" ,"1.0.1.230" ,"1.0.1.231" ,"1.0.1.232" ,"1.0.1.233" ,"1.0.1.234" ,"1.0.1.235" ,"1.0.1.236" ,"1.0.1.237" ,"1.0.1.238" ,"1.0.1.239" ,"1.0.1.240" ,"1.0.1.241" ,"1.0.1.242" ,"1.0.1.243" ,"1.0.1.244" ,"1.0.1.245" ,"1.0.1.246" ,"1.0.1.247" ,"1.0.1.248" ,"1.0.1.249" ,"1.0.1.250" ,"1.0.1.251" ,"1.0.1.252" ,"1.0.1.253" ,"1.0.1.254" ,"1.0.2.0" ,"1.0.2.1" ,"1.0.2.2" ,"1.0.2.3" ,"1.0.2.4" ,"1.0.2.5" ,"1.0.2.6" ,"1.0.2.7" ,"1.0.2.8" ,"1.0.2.9" ,"1.0.2.10" ,"1.0.2.11" ,"1.0.2.12" ,"1.0.2.13" ,"1.0.2.14" ,"1.0.2.15" ,"1.0.2.16" ,"1.0.2.17" ,"1.0.2.18" ,"1.0.2.19" ,"1.0.2.20" ,"1.0.2.21" ,"1.0.2.22" ,"1.0.2.23" ,"1.0.2.24" ,"1.0.2.25" ,"1.0.2.26" ,"1.0.2.27" ,"1.0.2.28" ,"1.0.2.29" ,"1.0.2.30" ,"1.0.2.31" ,"1.0.2.32" ,"1.0.2.33" ,"1.0.2.34" ,"1.0.2.35" ,"1.0.2.36" ,"1.0.2.37" ,"1.0.2.38" ,"1.0.2.39" ,"1.0.2.40" ,"1.0.2.41" ,"1.0.2.42" ,"1.0.2.43" ,"1.0.2.44" ,"1.0.2.45" ,"1.0.2.46" ,"1.0.2.47" ,"1.0.2.48" ,"1.0.2.49" ,"1.0.2.50" ,"1.0.2.51" ,"1.0.2.52" ,"1.0.2.53" ,"1.0.2.54" ,"1.0.2.55" ,"1.0.2.56" ,"1.0.2.57" ,"1.0.2.58" ,"1.0.2.59" ,"1.0.2.60" ,"1.0.2.61" ,"1.0.2.62" ,"1.0.2.63" ,"1.0.2.64" ,"1.0.2.65" ,"1.0.2.66" ,"1.0.2.67" ,"1.0.2.68" ,"1.0.2.69" ,"1.0.2.70" ,"1.0.2.71" ,"1.0.2.72" ,"1.0.2.73" ,"1.0.2.74" ,"1.0.2.75" ,"1.0.2.76" ,"1.0.2.77" ,"1.0.2.78" ,"1.0.2.79" ,"1.0.2.80" ,"1.0.2.81" ,"1.0.2.82" ,"1.0.2.83" ,"1.0.2.84" ,"1.0.2.85" ,"1.0.2.86" ,"1.0.2.87" ,"1.0.2.88" ,"1.0.2.89" ,"1.0.2.90" ,"1.0.2.91" ,"1.0.2.92" ,"1.0.2.93" ,"1.0.2.94" ,"1.0.2.95" ,"1.0.2.96" ,"1.0.2.97" ,"1.0.2.98" ,"1.0.2.99" ,"1.0.2.100" ,"1.0.2.101" ,"1.0.2.102" ,"1.0.2.103" ,"1.0.2.104" ,"1.0.2.105" ,"1.0.2.106" ,"1.0.2.107" ,"1.0.2.108" ,"1.0.2.109" ,"1.0.2.110" ,"1.0.2.111" ,"1.0.2.112" ,"1.0.2.113" ,"1.0.2.114" ,"1.0.2.115" ,"1.0.2.116" ,"1.0.2.117" ,"1.0.2.118" ,"1.0.2.119" ,"1.0.2.120" ,"1.0.2.121" ,"1.0.2.122" ,"1.0.2.123" ,"1.0.2.124" ,"1.0.2.125" ,"1.0.2.126" ,"1.0.2.127" ,"1.0.2.128" ,"1.0.2.129" ,"1.0.2.130" ,"1.0.2.131" ,"1.0.2.132" ,"1.0.2.133" ,"1.0.2.134" ,"1.0.2.135" ,"1.0.2.136" ,"1.0.2.137" ,"1.0.2.138" ,"1.0.2.139" ,"1.0.2.140" ,"1.0.2.141" ,"1.0.2.142" ,"1.0.2.143" ,"1.0.2.144" ,"1.0.2.145" ,"1.0.2.146" ,"1.0.2.147" ,"1.0.2.148" ,"1.0.2.149" ,"1.0.2.150" ,"1.0.2.151" ,"1.0.2.152" ,"1.0.2.153" ,"1.0.2.154" ,"1.0.2.155" ,"1.0.2.156" ,"1.0.2.157" ,"1.0.2.158" ,"1.0.2.159" ,"1.0.2.160" ,"1.0.2.161" ,"1.0.2.162" ,"1.0.2.163" ,"1.0.2.164" ,"1.0.2.165" ,"1.0.2.166" ,"1.0.2.167" ,"1.0.2.168" ,"1.0.2.169" ,"1.0.2.170" ,"1.0.2.171" ,"1.0.2.172" ,"1.0.2.173" ,"1.0.2.174" ,"1.0.2.175" ,"1.0.2.176" ,"1.0.2.177" ,"1.0.2.178" ,"1.0.2.179" ,"1.0.2.180" ,"1.0.2.181" ,"1.0.2.182" ,"1.0.2.183" ,"1.0.2.184" ,"1.0.2.185" ,"1.0.2.186" ,"1.0.2.187" ,"1.0.2.188" ,"1.0.2.189" ,"1.0.2.190" ,"1.0.2.191" ,"1.0.2.192"
						 /*'64.18.0.0',//1
						 '64.233.160.0',//2
						 '64.233.171.0',//3
						 '65.167.144.64',//4
						 '65.170.13.0',//5
						 '65.171.1.144',//6
						 '66.102.0.0',//7
						 '66.102.14.0',//8
						 '66.249.64.0',//9
						 '66.249.92.0',//10
						 '66.249.86.0',//11
						 '70.32.128.0',//12
						 '72.14.192.0',//13
						 '74.125.0.0',//14
						 '89.207.224.0',//15
						 '104.154.0.0',//16
						 '104.132.0.0',//17
						 '107.167.160.0',//18
					     '107.178.192.0',//19
						 '108.59.80.0',//20
						 '108.170.192.0',//21
						 '108.177.0.0',//22
						 '130.211.0.0',//23
						 '142.250.0.0',//24
						 '65.170.13.5',//25
						 '65.171.12.144',//26
						 '66.102.10.53',//27
						 '66.102.14.25',//28
						 '66.249.64.42',//29
						 '66.249.92.15',//30
						 '64.18.75.15',//31
						 '64.233.10.52',//32
						 '64.233.171.42',//33
						 '65.167.144.41',//34
						 '65.170.43.52',//35
						 '64.18.62.32',//36
						 '64.233.110.2',//37
						 '54.233.11.34',//38
						 '55.17.144.64',//39
						 '65.175.13.53',//40
						 '65.171.1.144',//41
						 '66.102.124.62',//42
						 '66.152.24.63',//43
						 '46.75.64.86',//44
						 '76.24.92.64',//45
						 '66.9.86.124',//46
						 '89.32.228.6',//47
						 '72.164.222.89',//48
						 '123.125.53.3',//49
						 '89.217.24.64',//50
						 '134.14.5.3',//51
						 '124.132.64.52',//52
						 '127.17.163.35',//53
					     '97.18.12.53',//54
						 '18.59.85.21',//55
						 '108.175.192.52',//53
						 '108.177.53.124',//54
						 '135.231.60.21',//55
						 '142.250.4.5',//56
						 '65.175.13.51',//57
						 '108.173.194.52',//58
						 '108.177.58.134',//59
						 '135.232.65.21',//60*/
						];

	public static $url = 'https://www.alphavantage.co/query?function=CURRENCY_EXCHANGE_RATE&from_currency={{param_from}}&to_currency={{param_to}}&apikey={{api_key}}';

	public static $JSON = [];

	public static $currencypairs = [];

	private static $DirCache= __DIR__.'/cache/';

	private static $ApiFile = __DIR__.'/apicounter';

	private static $DataFile = __DIR__.'/data';

	private static $DataInfo = [];

	private static $api_counter = 0;

	private static $cache_timeout = 30;
	private static $defaultTemplate = '<table id="{{id}}">
											<thead>
												<tr>
													<td colspan="2">
														Pair
													</td>
													<td>
														Exchange Rate
													</td>
													<td>
														Bid Price
													</td>
													<td>
														Ask Price
													</td>
													<td>
														Last Refresh
													</td>
												</tr>
											</thead>
											<tbody>
												{{rows}}
											</tbody>
										</table>';
	private static $defaultTemplateRow = '<tr>
											<td>
												<div>
													{{img}}
												</div>
											</td>
											<td>
												<span data-id="{{key}}">{{key}}</span>
											</td>
											<td>
												<span data-id="{{key}}_rate">{{rate}}</span>
											</td>
											<td>
												<span data-id="{{key}}_bid">{{bid}}</span>
											</td>
											<td>
												<span data-id="{{key}}_ask">{{ask}}</span>
											</td>
											<td>
												<span data-id="{{key}}_refresh">{{ref}}</span>
											</td>
										</tr>';
	private static $test = [];
	function __construct(){
		self::getDataFile();
		self::getApiCounter();
		self::doPairs();
		//self::setIPs();
		//TODO: при запуске скрипта сразу отдать кеш и в фоне выполнять запросы

		self::$test['expired'] =!self::hasCache() || self::isExpired();
		if ( (!self::hasCache() || self::isExpired()) && !self::isWorking() ) {
			self::getJSON();
			self::$test['json'] = self::$JSON;
			self::setCache();
		}else{
			self::$JSON = json_decode(self::getCache(),true);
		}
	}

	public static function setIPs(){
		$count = count(self::API_KEY);
		$ip_max = 255;
		$counter = 0;
		for ($i=1; $i < $ip_max; $i++) {
			for ($j=0; $j < $ip_max; $j++) {
				for ($f=0; $f < $ip_max; $f++) {
					for ($g=0; $g < $ip_max; $g++) {
						array_push(self::$ip_adresses, $i.'.'.$j.'.'.$f.'.'.$g);
						$counter++;
						if($counter >= $count) break 4;
					}
				}
			}
		}
		foreach (self::$ip_adresses as $key => $value) {
			echo '"'.$value.'" ,';
		}
		echo "<br>$counter";
	}

	public static function doPairs(){
		foreach (self::CURRENCIES as $key => $currency) {
			foreach (self::CURRENCIES as $k => $v) {
				if ($v == $currency) continue;
				self::$currencypairs[$currency.$v] = [];
				array_push(self::$currencypairs[$currency.$v], $currency);
				array_push(self::$currencypairs[$currency.$v], $v);
			}
		}
	}
	public static function getJSON(){
		$counter = 0;
		self::setWorking(true);
        self::setDataFile();
		foreach (self::$currencypairs as $key => $value) {
			$url = self::setApiUrl($value);

			$temp = self::execCurl($url,self::$ip_adresses[self::$api_counter]);

			self::$JSON[$key] = json_decode($temp,true);

			$counter++;
			self::$test[$counter] =self::$ip_adresses[self::$api_counter];
			self::$test[$counter.'_api'] =self::API_KEY[self::$api_counter];
			if ($counter%2 == 0) {
				self::$api_counter++;
				self::resetCounter();
			}
		}
		self::setApiCounter();
		self::setWorking(false);
		self::setDataFile();
	}

	public function setApiUrl($pair){
		$url = self::$url;

		$url = str_replace("{{param_from}}", $pair[0],$url);
		$url = str_replace("{{param_to}}", $pair[1], $url);
		$url = str_replace("{{api_key}}", self::API_KEY[self::$api_counter], $url);

		return $url;
	}
	public function resetCounter(){
		if (self::$api_counter >= count(self::API_KEY) ) {
			self::$api_counter = 0;
		}
	}
	public function getDataFile(){
		if (is_file(self::$DataFile)) {
			self::$DataInfo = json_decode(file_get_contents(self::$DataFile),true);
		}else{
			self::$DataInfo['api_counter'] = 0;
			self::$DataInfo['working'] = false;
		}
	}
	public function setDataFile(){
		file_put_contents(self::$DataFile, json_encode(self::$DataInfo));
	}
	public function setWorking($bool){
		self::$DataInfo['working'] = $bool;
	}
	public function isWorking(){
		return self::$DataInfo['working'];
	}
	public function getApiCounter(){
		//self::$api_counter = file_get_contents(self::$ApiFile);
		self::$api_counter = self::$DataInfo['api_counter'];
	}
	public function setApiCounter(){
		//file_put_contents(self::$ApiFile, self::$api_counter);
		self::$DataInfo['api_counter'] = self::$api_counter;
	}
	public function setCache(){
		return( file_put_contents(self::$DirCache.'test', json_encode(self::$JSON)) );
	}
	public function isExpired(){
		if (time() - filemtime(self::$DirCache.'test') > self::$cache_timeout) return true;
		return false;
	}
	public function getCache(){
		return file_get_contents(self::$DirCache.'test');
	}
	public function hasCache(){
		return is_file(self::$DirCache.'test');
	}
	public static function execCurl($url,$ip){
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'ORIGIN: '.$_SERVER['HOSTNAME'].time(),
		    "REMOTE_ADDR: $ip",
		    "HTTP_X_FORWARDED_FOR: $ip",
		   	"CLIENT-IP: $ip",
			"X-FORWARDED-FOR: $ip",
		));
		$temp = curl_exec($ch);
		curl_close ($ch);

		return $temp;
	}
	public function getImg($key){
		$content = '';
		$c1 = strtolower(substr(self::$currencypairs[$key][0],0,2));
		$c2 = strtolower(substr(self::$currencypairs[$key][1],0,2));
		$content = '<img src="https://www.countryflags.io/'.$c1.'/flat/16.png"/><img src="https://www.countryflags.io/'.$c2.'/flat/16.png"/>';
		return $content;
	}
	public function getRows($tamplateRow=false){
		$content= '';
		$contentTamplate = $tamplateRow?$tamplateRow:self::$defaultTemplateRow;

		foreach (self::$JSON as $key => $value) {
			$img = self::getImg($key);
			$temp = $contentTamplate;
			$temp = str_replace("{{img}}", $img, $temp);
			$temp = str_replace("{{key}}", $key, $temp);
			$temp = str_replace("{{rate}}", $value["Realtime Currency Exchange Rate"]["5. Exchange Rate"], $temp);
			$temp = str_replace("{{bid}}", $value["Realtime Currency Exchange Rate"]["8. Bid Price"], $temp);
			$temp = str_replace("{{ask}}", $value["Realtime Currency Exchange Rate"]["9. Ask Price"], $temp);
			$temp = str_replace("{{ref}}", $value["Realtime Currency Exchange Rate"]["6. Last Refreshed"], $temp);
			$content .=$temp;
			/*$content .= '<tr>
							<td>
								<div>
									'.$img.'
								</div>
							</td>
							<td>
								<span data-id="'.$key.'">'.$key.'</span>
							</td>
							<td>
								<span data-id="'.$key.'_rate'.'">'.$value["Realtime Currency Exchange Rate"]["5. Exchange Rate"].'</span>
							</td>
							<td>
								<span data-id="'.$key.'_bid'.'">'.$value["Realtime Currency Exchange Rate"]["8. Bid Price"].'</span>
							</td>
							<td>
								<span data-id="'.$key.'_ask'.'">'.$value["Realtime Currency Exchange Rate"]["9. Ask Price"].'</span>
							</td>
							<td>
								<span data-id="'.$key.'_refresh'.'">'.$value["Realtime Currency Exchange Rate"]["6. Last Refreshed"].'</span>
							</td>
						</tr>';*/
		}
		return $content;
	}
	public function print($id , $tamplate=false , $tamplateRow = false){
		$rows = self::getRows($tamplateRow);
		$content = $tamplate?$tamplate:self::$defaultTemplate;
		$content = str_replace("{{id}}", $id, $content);
		$content = str_replace("{{rows}}", $rows, $content);
		echo $content;
		/*echo '<table id="'.$id.'">
				<thead>
					<tr>
						<!--<td>
							<span style="display: none;">Flags</span>
						</td>-->
						<td colspan="2">
							Pair
						</td>
						<td>
							Exchange Rate
						</td>
						<td>
							Bid Price
						</td>
						<td>
							Ask Price
						</td>
						<td>
							Last Refresh
						</td>
					</tr>
				</thead>
				<tbody>
					'.$rows.'
				</tbody>
			</table>';*/
	}
	public function printJSON(){
		self::$JSON['test'] = self::$test;
		print (json_encode(self::$JSON));
	}
}
?>
