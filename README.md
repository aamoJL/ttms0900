# ttms0900
harjoitustyo ttms0900 0500


https://www.fluidui.com/editor/live/preview/p_0BPSzFuHCsna36F3EZc74nrWcarUWENU.1477322647597

v0.1: http://student.labranet.jamk.fi/~H9031/harj/

- tietokantana SQLite3
- includeseissa header, footer
- ttms0500, 0900.php dokumentteja

Tietokanta SQL:

CREATE TABLE "Video" (
	`id`	INTEGER NOT NULL UNIQUE,
	`nimi`	TEXT,
	`kanava`	TEXT,
	`YTid`	TEXT NOT NULL,
	`lisaaja`	TEXT NOT NULL DEFAULT 'anon',
	`tila`	TEXT NOT NULL DEFAULT 'jono',
	`lisatty`	TEXT NOT NULL,
	`soitettu`	TEXT,
	PRIMARY KEY(`id`)
);
INSERT INTO `Video` VALUES (1,'Athletic (PAL Version) - Super Mario World','SiIvagunner','rEcOzjg7vBU','anon','jono','10.11.2016',NULL);
INSERT INTO `Video` VALUES (2,'Main Theme (Halloween Update) - Despicable Me: Minion Rush','SiIvagunner','dVjEonh3N0s','anon','jono','10.11.2016',NULL);
INSERT INTO `Video` VALUES (3,'Flower Garden (Gamma Mix) - Super Mario World 2: Yoshi''s Island','SiIvagunner','YNO97FDImwI','anon','jono','10.11.2016',NULL);
INSERT INTO `Video` VALUES (4,'Outside - Fester''s Quest','SiIvagunner','EQd5Mwn_Kjs','anon','jono','10.11.2016',NULL);
INSERT INTO `Video` VALUES (5,'Mystic Mansion (Vinyl Mix) - Sonic Heroes','SiIvagunner','oQiPTM8res0','anon','jono','10.11.2016',NULL);
INSERT INTO `Video` VALUES (6,'Bloodlines (Extended Mix) - Castlevania: Dracula X','SiIvagunner','3pCQTYcaEGk','anon','soitettu','10.11.2016',NULL);
INSERT INTO `Video` VALUES (7,'Unused Track 5 - Ghost Trick: Phantom Detective','SiIvagunner','QeCvS_Xmp-A','anon','soitettu','10.11.2016',NULL);
CREATE TABLE `Kayttaja` (
	`id`	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
	`nimi`	TEXT NOT NULL UNIQUE,
	`salasana`	TEXT NOT NULL,
	`tyyppi`	TEXT NOT NULL DEFAULT 'kayttaja'
);
