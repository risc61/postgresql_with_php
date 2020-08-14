--
-- PostgreSQL database cluster dump
--

SET default_transaction_read_only = off;

SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;

--
-- Databases
--

--
-- Database "template1" dump
--

\connect template1

--
-- PostgreSQL database dump
--

-- Dumped from database version 12.3
-- Dumped by pg_dump version 12.3

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- PostgreSQL database dump complete
--

--
-- Database "Forum" dump
--

--
-- PostgreSQL database dump
--

-- Dumped from database version 12.3
-- Dumped by pg_dump version 12.3

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: Forum; Type: DATABASE; Schema: -; Owner: postgres
--

CREATE DATABASE "Forum" WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'Turkish_Turkey.1254' LC_CTYPE = 'Turkish_Turkey.1254';


ALTER DATABASE "Forum" OWNER TO postgres;

\connect "Forum"

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- Data for Name: ayarlar; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.ayarlar (uygulama_id, uygulama_adi, uygulama_kul_sayisi, uygulama_onay, uygulama_hata_sayisi) FROM stdin;
\.


--
-- Data for Name: universiteler; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.universiteler (universite_id, universite_adi) FROM stdin;
\.


--
-- Data for Name: fakulteler; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.fakulteler (fakulte_id, fakulte_adi, universite_ref_id) FROM stdin;
\.


--
-- Data for Name: bolumler; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.bolumler (bolum_id, bolum_adi, fakulte_ref_id) FROM stdin;
\.


--
-- Data for Name: kategoriler; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.kategoriler (kategori_id, kategori_adi, created_on, kategori_ref_id) FROM stdin;
1	Ana Kategori	2000-01-01 00:00:00	1
2	elektronik	\N	1
24	TV	\N	2
26	samsung	\N	24
\.


--
-- Data for Name: kullanicilar; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.kullanicilar (kullanici_id, kullanici_adi, sifre, email, created_on, last_login, universite, adres, "itibarPuani") FROM stdin;
1	ibrahim	123654	sau@sau.com	2012-12-12	2012-12-12	izmir üniversite	adressim burasi	\N
\.


--
-- Data for Name: markalar; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.markalar (marka_id, marka_adi, created_on, kategori_ref_id) FROM stdin;
1	Samsung	\N	24
\.


--
-- Data for Name: makaleler; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.makaleler (makale_id, makale_baslik, makale_icerik, makale_resim, created_on, kategori_ref_id, marka_ref_id, oy, onay, ref_kullanici_id, makale_durum, total) FROM stdin;
39	bozuk Samsung	<p>fasdfsa</p>	yok.png	2020-07-21	1	\N	100	t	1	0	\N
42	dsfasdfa	<p>sdfasdfasdf</p>	yok.png	2020-07-21	1	\N	50	t	1	0	\N
89	yeni makalem	<p>aslanım eler eller</p>	yok.png	2020-07-24	1	\N	50	t	1	0	\N
115	duzenleen makale	<p>duzenlelnen makale</p>\r\n<div id="gtx-trans" style="position: absolute; left: 10px; top: -17px;">&nbsp;</div>	yok.png	2020-07-24	1	\N	60	t	1	0	\N
144	bilgi	<p>bilgi</p>\r\n<div id="gtx-trans" style="position: absolute; left: -56px; top: -17px;">&nbsp;</div>	yok.png	2020-08-14	1	\N	78	t	1	1	11
136	bilir kişi	<p>onaylı makaleler</p>	yok.png	2020-08-14	1	\N	85	t	1	1	\N
135	sau	<p>bruasi</p>	yok.png	2020-08-14	1	\N	120	t	1	1	\N
134	bilgisyar	<p>burasi&nbsp;</p>	yok.png	2020-08-14	1	\N	10	t	1	1	\N
143	odev	<p>sadfasdf</p>	yok.png	2020-08-14	1	\N	65	f	1	1	10
\.


--
-- Data for Name: yorumlar; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.yorumlar (yorum_id, yorum_adi, yorum_tarihi, yorum_makale_ref_id, yorum_tur_id, yorum_yararli, yorum_yararsiz, yorum_gor_sayisi, link, client_ip) FROM stdin;
\.


--
-- Data for Name: coktansecmeli; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.coktansecmeli (coktansecmeli_id, a, b, c, d, yorum_ref_id) FROM stdin;
\.


--
-- Data for Name: dogruyanlis; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.dogruyanlis (dogruyanlis_id, dogru, yanlis, yorum_ref_id) FROM stdin;
\.


--
-- Data for Name: duyurular; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.duyurular (duyuru_id, duyuru_baslik, duyuru_icerik, kullanici_ref_id) FROM stdin;
\.


--
-- Data for Name: etiketler; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.etiketler (etiket_id, etiket_adi, etiket_kul_sayisi, etiketi_buyut) FROM stdin;
\.


--
-- Data for Name: g_makaleler; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.g_makaleler (makale_id, makale_baslik, makale_icerik, makale_resim, created_on, kategori_ref_id, marka_ref_id, oy, onay) FROM stdin;
182	veri tab	<p>veri tabbbbbbb</p>	yok.png	2020-08-14	1	\N	\N	t
183	veri tab	<p>veri tababi</p>	yok.png	2020-08-14	1	\N	\N	t
\.


--
-- Data for Name: iller; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.iller (il_id, il_adi) FROM stdin;
\.


--
-- Data for Name: ilceler; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.ilceler (ilce_id, ilce_adi, il_ref_id) FROM stdin;
\.


--
-- Data for Name: role; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.role (role_id, role_name) FROM stdin;
1	Admin
2	Editor
4	visitor
\.


--
-- Data for Name: kullanici_role; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.kullanici_role (kullanici_id, role_id) FROM stdin;
1	1
\.


--
-- Data for Name: o_makaleler; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.o_makaleler (o_makale_id, ref_makale_id) FROM stdin;
\.


--
-- Data for Name: sil_kategoriler; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.sil_kategoriler (kategori_id, kategori_adi, created_on, kategori_ref_id) FROM stdin;
\.


--
-- Data for Name: silinen_makaleler; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.silinen_makaleler (makale_id, makale_baslik, makale_icerik, makale_resim, created_on, kategori_ref_id, marka_ref_id, oy, onay, ref_kullanici_id) FROM stdin;
180	gggggggg	<p>dsgsdfgsdg</p>	yok.png	2020-08-14	1	\N	\N	t	1
184	veri tabani 202020202	<p>veri tababi</p>	yok.png	2020-08-14	1	\N	\N	t	1
\.


--
-- Data for Name: sorucevap; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.sorucevap (sorucevap_id, cevap, yorum_ref_id) FROM stdin;
\.


--
-- Name: account_user_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.account_user_id_seq', 2, true);


--
-- Name: ayarlar_uygulama_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.ayarlar_uygulama_id_seq', 1, false);


--
-- Name: bolumler_bolum_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.bolumler_bolum_id_seq', 1, false);


--
-- Name: coktansecmeli_coktansecmeli_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.coktansecmeli_coktansecmeli_id_seq', 1, false);


--
-- Name: dogruyanlis_dogruyanlis_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.dogruyanlis_dogruyanlis_id_seq', 1, false);


--
-- Name: duyurular_duyuru_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.duyurular_duyuru_id_seq', 1, false);


--
-- Name: etiketler_etiket_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.etiketler_etiket_id_seq', 1, false);


--
-- Name: fakulteler_fakulte_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.fakulteler_fakulte_id_seq', 1, false);


--
-- Name: ilceler_ilce_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.ilceler_ilce_id_seq', 1, false);


--
-- Name: iller_il_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.iller_il_id_seq', 1, false);


--
-- Name: kategoriler_kategori_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.kategoriler_kategori_id_seq', 27, true);


--
-- Name: makaleler_makale_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.makaleler_makale_id_seq', 184, true);


--
-- Name: markalar_marka_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.markalar_marka_id_seq', 1, true);


--
-- Name: o_makaleler_o_makale_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.o_makaleler_o_makale_id_seq', 38, true);


--
-- Name: role_role_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.role_role_id_seq', 4, true);


--
-- Name: sorucevap_sorucevap_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.sorucevap_sorucevap_id_seq', 1, false);


--
-- Name: universiteler_universite_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.universiteler_universite_id_seq', 1, false);


--
-- Name: yorumlar_yorum_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.yorumlar_yorum_id_seq', 1, false);


--
-- PostgreSQL database dump complete
--

--
-- Database "makaleSitesi" dump
--

--
-- PostgreSQL database dump
--

-- Dumped from database version 12.3
-- Dumped by pg_dump version 12.3

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: makaleSitesi; Type: DATABASE; Schema: -; Owner: postgres
--

CREATE DATABASE "makaleSitesi" WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'Turkish_Turkey.1254' LC_CTYPE = 'Turkish_Turkey.1254';


ALTER DATABASE "makaleSitesi" OWNER TO postgres;

\connect "makaleSitesi"

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- Data for Name: kategoriler; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.kategoriler (id, adi, kategorireferansid) FROM stdin;
1	Css	3
2	MVC	1
3	ASP	2
4	PHP	3
5	Jquery	1
6	C++	1
7	JAVA	1
8	Matlab	7
9	Apache	1
10	Pınar	1
\.


--
-- Data for Name: kullanicilar; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.kullanicilar (id, adi, soyadi, telefon, email, adres) FROM stdin;
1	ibrahim uğur 	yılmaz	05536173235	ibrahimugur@outlook.com	psosof
2	Pınar	İskender	05442868671	pinar@yilmaz.com	Sütöüler Çandır Köyü
3	Salih	Şahin	0222 333 666 99	salih@hotmail.com	Posof Ardahan
4	gurhan	kuleyin	0222 333 55 66	gurhan@gurhan.com	trabxon
5	muhammed	S.a.v	0 123 456 5555	muhammed@muhammed.com	MEkke
6	muhammed	S.a.v	0 123 456 5555	muhammed@muhammed.com	MEkke
7	muhammed	S.a.v	05442868671	muhammed@muhammed.com	MEkke
8	Pınar	İskender	05442868671	ibrahimuguryilmaz@gmail.com	POHOK
9	Pınar	İskender	05442868671	ibrahimuguryilmaz@gmail.com	POHOK
10	muhammed	S.a.v	05442868671	muhammed@muhammed.com	MEkke
11	süleyman	Avcı	0213 252 363 9	suleyman@akdoğan.com	POSOF
12	utku	yıldız	123456789	utku@utku.com	Posof
13	yeni	yeniden	02134567	y@y.com	POSOF
14	Pınar	İskender	02154789865	pinariskender@live.com	POSOF
16	ibrahim uğur	Yılmaz	0246 358 62 84	a@a.com	sütçüler çandır
\N	ibrahim	Yılmaz	1232654789	s@s.com	Yıldızlı\r\n
\N	ibrahim	Yılmaz		s@s.com	
\N	ibrahim	Yılmaz		s@s.com	
\N	ibrahim	Yılmaz		s@s.com	
\N	ibrahim	Yılmaz		s@s.com	
\N	ibrahim	Yılmaz	1232654789	s@s.com	Yıldızlı\r\nMutlu Apartman
\N	ibrahim	Yılmaz	1232654789	s@s.com	Yıldızlı\r\nMutlu Apartman
\N	ibrahim	Yılmaz	1232654789	s@s.com	Yıldızlı\r\nMutlu Apartman
\.


--
-- Data for Name: kullaniciparola; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.kullaniciparola (id, kullanicirefid, sifre) FROM stdin;
1	2	e10adc3949ba59abbe56e057f20f883e
2	9	e10adc3949ba59abbe56e057f20f883e
3	10	a2640ae2b148c130feebd7605e07ec40aacd2f7c
4	11	c56d0e9a7ccec67b4ea131655038d604
5	12	a970a7e3b359f88a4732b56050822888
6	13	c56d0e9a7ccec67b4ea131655038d604
7	14	9a438af898f2472af7a0c9f4351fffaa
9	16	c56d0e9a7ccec67b4ea131655038d604
\.


--
-- Data for Name: kullanicirol; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.kullanicirol (id, kullanicirefid, kullanicirolid) FROM stdin;
1	14	1
2	13	2
\.


--
-- Data for Name: makaleler; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.makaleler (id, adi, detay, resim, yayinlayankisi, yayinlanmatarihi, kategorirefid) FROM stdin;
20	CSS Tanım	<p>Cascading Style Sheets (Basamaklı Stil Şablonları ya da Basamaklı Bi&ccedil;im Sayfaları, bilinen kısa adıyla CSS), HTML'e ek olarak metin ve format bi&ccedil;imlendirme alanında fazladan olanaklar sunan bir Web teknolojisidir..</p>\r\n<p>Cascading Style Sheets (Basamaklı Stil Şablonları ya da Basamaklı Bi&ccedil;im Sayfaları, bilinen kısa adıyla CSS), HTML'e ek olarak metin ve format bi&ccedil;imlendirme alanında fazladan olanaklar sunan bir Web teknolojisidir..</p>\r\n<p>&nbsp;</p>\r\n<p>Cascading Style Sheets (Basamaklı Stil Şablonları ya da Basamaklı Bi&ccedil;im Sayfaları, bilinen kısa adıyla CSS), HTML'e ek olarak metin ve format bi&ccedil;imlendirme alanında fazladan olanaklar sunan bir Web teknolojisidir..</p>\r\n<p>&nbsp;</p>	1	1	2017-01-10 13:13:37	2
22	CSS tanım	<p>Cascading Style Sheets (Basamaklı Stil Şablonları ya da Basamaklı Bi&ccedil;im Sayfaları, bilinen kısa adıyla CSS), HTML'e ek olarak metin ve format bi&ccedil;imlendirme alanında fazladan olanaklar sunan bir Web teknolojisidir. İnternet sayfaları 	1	1	2017-01-06 11:56:10	1
23	MVC Kitabı	<p>Mvc Kiytabını seviyorum</p>	1	1	2017-01-10 13:16:08	2
24	İsim	<p style="text-align: center;">İbrahim uğur Yılmaz</p>	Adsız.png	1	2016-05-06 08:23:30	3
26	Aşk	<p>Seni seviyorum</p>	20161107_103140.jpg	1	2016-12-30 13:30:56	10
\.


--
-- Data for Name: roller; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.roller (id, adi) FROM stdin;
1	Admin
2	Editor
3	Okuyucu
\.


--
-- PostgreSQL database dump complete
--

--
-- Database "postgres" dump
--

\connect postgres

--
-- PostgreSQL database dump
--

-- Dumped from database version 12.3
-- Dumped by pg_dump version 12.3

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- PostgreSQL database dump complete
--

--
-- PostgreSQL database cluster dump complete
--

