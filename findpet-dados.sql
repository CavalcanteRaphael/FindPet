SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


INSERT INTO `depoimentos` (`id`, `iduser`, `texto`) VALUES
(1, 2, 'Site maravilhoso, muito eficaz. Achei meu cachorro graças a esse site espetacular!! Não sei nem como agradecer!'),
(2, 3, 'Site excelente, de procedência total, cumpre além do que diz. Muito bom!'),
(3, 9, 'Único site que conseguiu encontrar meu cachorro, sou muito grata!'),
(4, 9, 'Amoo'),
(5, 3, 'Muito bom site , perdi meu gato a pouco tempo e já encontrou , obrigado FindPet'),
(6, 3, 'Meu gato fugiu novamente e graças ao site ele voltou !!! Obrigado'),
(7, 5, 'Olha, nunca achei que iria existir um site com tanta qualidade. Meu papagaio que estava com roupa de gato, fugiu, em menos de 2 dias eu achei ele, obrigado ao criador do site e todos que participaram da construção dessa maravilhosa ferramenta, Obrigado.');

INSERT INTO `usuario` (`idusuario`, `nome`, `email`, `img`, `telefone`, `senha`) VALUES
(1, 'Sandro Mariano', 'sandrolalo@hotmail.com', 'profile.jpg', '12997261834', 'a5d124e34bcdc8f005b7d06ad05d5944e499a50e'),
(2, 'Janayna Thomaz ', 'janayna.stefanini@gmail.com ', 'profile.jpg', '(12) 98208-6181', 'cb94cab4d2c696f73fd42be369ac28fb1faf6cf7'),
(3, 'Gabriel Crisostomo Soares de Farias', 'gabrielcrisostomo2001@outlook.com', 'profile.jpg', '(12) 98131-9911', 'ded43e5a454fe1bd2c09bfd499db518348abdb75'),
(4, 'Caroline Rocha', 'carolinerocha034@gmail.com', 'profile.jpg', '(12) 99754-4206', '67cbf9b0aa143234fb538a36f234e1a30a5555f6'),
(5, 'Bruno Barbosa', 'barbosabruno44@gmail.com', 'profile.jpg', '', '15697c06fc36e24fdb5e82e9a15fba63d8416b1d'),
(6, 'mariozan', 'mariozanjunior15@gmail.com', 'profile.jpg', '(12) 98213-5453', '12126eefdb32e502cce66879e8280a4d83418270'),
(7, 'william', 'williamcrixi@gmail.com', 'profile.jpg', '(12) 98134-0420', '9048ead9080d9b27d6b2b6ed363cbf8cce795f7f'),
(8, 'Mario', 'mariozanjunior15@gmail.com', 'profile.jpg', '(12) 98213-5453', '8cb2237d0679ca88db6464eac60da96345513964'),
(9, 'Mayara Barbosa', 'mbarbosam@gmail.com', 'profile.jpg', '(12) 98305-8603', 'ab222d26d933c6dcc99185dbd218ea61faabf8dd'),
(10, 'Raphel Fernandes','raphafrc81@gmail.com','profile.jpg','(12) 982695053', 'a5d124e34bcdc8f005b7d06ad05d5944e499a50e');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
