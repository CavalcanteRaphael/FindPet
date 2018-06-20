SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

INSERT INTO `animal` (`idanimal`, `especie`, `raca`, `sexo`, `porte`, `cor`, `img`, `tipo`, `descricao`, `nome`, `castrado`, `idusuario`, `vacinado`, `nascimento`) VALUES
(1, 'cachorro', 'buldogue', 2, 'pequeno', 'preto', 'animalProfile.png', 'doacao', 'não tenho paciencia para cuidar', 'vi ane ', 0, 10, 0, NULL),
(2, 'cachorro', 'vira lata', 1, 'medio', 'castanho', 'animalProfile.png', 'doacao', 'Não tenho como manter', 'dog', 1, 10, 1, NULL),
(3, 'gato', 'himalaio', 1, 'mini', 'Castanho', 'animalProfile.png', 'perdido', 'Perdi caminhando pela praia no quiosque 32', 'juzo', 1, 10, 0, NULL),
(4, 'cachorro', 'sheepdog', 1, 'medio', 'branco', 'animalProfile.png', 'perdido', 'ele saiu correndo em direção a uma avenida no indaiá ', 'Enio', 1, 10, 0, NULL),
(5, 'gato', 'somali', 2, 'grande', 'amarelo','animalProfile.png', 'perdido', 'não o vejo desde nossa ida ao parque', 'sham', 1, 10, 1, NULL),
(6, 'cachorro', 'pointer', 1, 'grande', 'branco', 'animalProfile.png', 'perdido', 'sumiu na maranduba', 'kevin', 1, 10, 1, NULL),
(7, 'gato', 'peterbald', 1, 'grande', 'branco', 'animalProfile.png', 'encontrado', 'encontrei ele indo para pouso alto', 'null', 1, 10, 1, NULL),
(8, 'cachorro', 'vira lata', 1, 'mini', 'preto','animalProfile.png', 'perdido', 'perdi nas minhas ferias no amazonas', 'pitoco', 1, 10, 1, NULL),
(9, 'gato', 'havana', 2, 'grande', 'preto', 'animalProfile.png', 'doacao', '.', 'mafalda', 1, 10, 1, NULL),
(10, 'gato', 'korat', 2, 'grande', 'cinza', 'animalProfile.png', 'doacao', 'doando ', 'herminia', 0, 10, 1, NULL),
(11, 'cachorro', 'dalmata', 1, 'grande', 'branco','animalProfile.png', 'encontrado', 'encontrei em uma caixa', 'null', 1, 10, 1, NULL),
(12, 'cachorro', 'pinscher', 1, 'mini', 'preto', 'animalProfile.png', 'encontrado', 'encontrei esse filhote', 'null', 1, 10, 1, NULL),
(13, 'cachorro', 'pastor alemão', 1, 'gigante', 'castanho', 'animalProfile.png', 'doacao', 'não tenho tempo para cuidar', 'ralf', 0, 10, 0, NULL),
(14, 'gato', 'singapura', 2, 'medio', 'bege', 'animalProfile.png', 'encontrado', 'encontrei andando pelas ruas', 'null', 1, 10, 1, NULL);


INSERT INTO `depoimentos` (`id`, `iduser`, `texto`) VALUES
(1, 2, 'Site maravilhoso, muito eficaz. Achei meu cachorro graças a esse site espetacular!! Não sei nem como agradecer!'),
(2, 3, 'Site excelente, de procedência total, cumpre além do que diz. Muito bom!'),
(3, 9, 'Único site que conseguiu encontrar meu cachorro, sou muito grata!'),
(4, 9, 'Amoo'),
(5, 3, 'Muito bom site , perdi meu gato a pouco tempo e já encontrou , obrigado FindPet'),
(6, 3, 'Meu gato fugiu novamente e graças ao site ele voltou !!! Obrigado'),
(7, 5, 'Olha, nunca achei que iria existir um site com tanta qualidade. Meu papagaio que estava com roupa de gato, fugiu, em menos de 2 dias eu achei ele, obrigado ao criador do site e todos que participaram da construção dessa maravilhosa ferramenta, Obrigado.');


INSERT INTO `mapa` (`idmapa`, `idanimal`, `latitude`, `longitude`) VALUES
(1, 1, '-23.6264921600533140', '-45.4271389068205200'),
(2, 2, '-23.6276323792262800', '-45.4149509490568450'),
(3, 3, '-23.6392846532979140', '-45.4213936151749100'),
(4, 4, '-23.6283843285624720', '-45.4248912157303300'),
(5, 5, '-23.6254158232468800', '-45.4108364404922900'),
(6, 6, '-23.5371556538112400', '-45.2296907724625040'),
(7, 7, '-23.5314652827818500', '-45.4173542083984200'),
(8, 8, '-2.3636792908614440', '-67.8383899749999800'),
(9, 9, '-8.0506185840167400', '-42.3501087249999840'),
(10, 10, '-29.1445657950802150', '-50.3481555999999840'),
(11, 11, '-21.3222137487079100', '-56.8520618499999840'),
(12, 12, '-2.0562912753328860', '-54.6547962249999840'),
(13, 13, '-9.3537717199992020', '-70.5629993499999800'),
(14, 14, '-11.3099527397957940', '-47.8213001312500400');



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
(10, 'Raphel Fernandes', 'raphafrc81@gmail.com', 'profile-10.jpeg', '(12) 982695053', 'a5d124e34bcdc8f005b7d06ad05d5944e499a50e');
COMMIT;

