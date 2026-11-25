
SET NAMES utf8mb4;
DROP TABLE IF EXISTS vuokraukset;
DROP TABLE IF EXISTS asiakkaat;
DROP TABLE IF EXISTS autot;

-- onkovapaa: 1 = vapaana, 0 = vuokrattu
CREATE TABLE autot (
  auto_id INT AUTO_INCREMENT PRIMARY KEY,
  rekisterinumero VARCHAR(7),
  merkki VARCHAR(18),
  malli VARCHAR(90),
  tyyppi VARCHAR(20),
  korimalli VARCHAR(20),
  kayttovoima VARCHAR(20),
  vaihteisto VARCHAR(20),
  vuosimalli INT,
  hinta DECIMAL(6,2),
  onkovapaa TINYINT(1) DEFAULT 1
) DEFAULT CHARSET=utf8mb4;

CREATE TABLE asiakkaat (
  asiakas_id INT AUTO_INCREMENT PRIMARY KEY,
  etunimi VARCHAR(50),
  sukunimi VARCHAR(50),
  puhelin VARCHAR(20),
  henkilotunnus CHAR(11),
  sahkoposti VARCHAR(100),
  ajokortti VARCHAR(20),
  osoite VARCHAR(100)
) DEFAULT CHARSET=utf8mb4;

-- palautettu: NULL = auto on vielä vuokrattuna
CREATE TABLE vuokraukset (
  vuokraus_id INT AUTO_INCREMENT PRIMARY KEY,
  auto_id INT,
  asiakas_id INT,
  pvm DATE,
  palautettu DATE NULL DEFAULT NULL
) DEFAULT CHARSET=utf8mb4;

-- 7 autoa autot 1 ja 3 on vuokrattu
INSERT INTO autot (rekisterinumero, merkki, malli, tyyppi, korimalli, kayttovoima, vaihteisto, vuosimalli, hinta, onkovapaa) VALUES
('ABC-123', 'Volvo', 'XC40', 'Henkilöauto', 'Maastoauto', 'Bensiini', 'Manuaali', 2026, 99.90, 0),
('BCD-234', 'Toyota', 'Corolla', 'Henkilöauto', 'Farmari', 'Hybridi', 'Automaatti', 2022, 79.90, 1),
('CDE-345', 'Volkswagen', 'Golf', 'Henkilöauto', 'Viistoperä', 'Bensiini', 'Manuaali', 2021, 69.90, 0),
('DEF-456', 'Ford', 'Focus', 'Henkilöauto', 'Viistoperä', 'Diesel', 'Automaatti', 2020, 74.90, 1),
('EFG-567', 'Skoda', 'Octavia', 'Henkilöauto', 'Farmari', 'Diesel', 'Automaatti', 2023, 84.90, 1),
('FGH-678', 'Nissan', 'Qashqai', 'Henkilöauto', 'Maastoauto', 'Bensiini', 'Manuaali', 2022, 89.90, 1),
('GHJ-789', 'Toyota', 'Yaris', 'Henkilöauto', 'Viistoperä', 'Hybridi', 'Automaatti', 2024, 64.90, 1);

-- 6 asiakasta 
INSERT INTO asiakkaat (etunimi, sukunimi, puhelin, henkilotunnus, sahkoposti, ajokortti, osoite) VALUES
('Matti', 'Meikäläinen', '0412345678', '010190-123A', 'matti.meikalainen@example.com', '123456789', 'Isokyläntie 14, Sipoo'),
('Liisa', 'Virtanen', '0501234567', '081004A123B', 'liisa.virtanen@example.com', '234567890', 'Kotikatu 11 A 3, Helsinki'),
('Ville', 'Korhonen', '0451112233', '150385-234C', 'ville.korhonen@example.com', '345678901', 'Mannerheimintie 5, Helsinki'),
('Aino', 'Nieminen', '0403334455', '220792-345D', 'aino.nieminen@example.com', '456789012', 'Tikkurilantie 8, Vantaa'),
('Jari', 'Laine', '0447778899', '030678-456E', 'jari.laine@example.com', '567890123', 'Kauppakatu 2, Porvoo'),
('Sara', 'Mäkinen', '0409998877', '111199A567F', 'sara.makinen@example.com', '678901234', 'Rantatie 21, Espoo');

-- 4 vuokrausta: vuokraukset 1 ja 2 ovat avoimia
INSERT INTO vuokraukset (auto_id, asiakas_id, pvm, palautettu) VALUES
(1, 1, '2026-11-25', NULL),
(3, 2, '2026-11-23', NULL),
(2, 3, '2026-11-01', '2026-11-05'),
(4, 4, '2026-11-10', '2026-11-14');
