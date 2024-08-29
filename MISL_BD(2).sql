-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 147.45.237.36
-- Время создания: Июн 16 2024 г., 22:56
-- Версия сервера: 8.0.22-13
-- Версия PHP: 8.1.2-1ubuntu2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `MISL_BD`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'гитарные успехи'),
(2, 'Оборудование'),
(3, 'Обучение игре'),
(4, 'Выбор инструмента');

-- --------------------------------------------------------

--
-- Структура таблицы `comment`
--

CREATE TABLE `comment` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `post_id` int NOT NULL,
  `description` varchar(255) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `comment`
--

INSERT INTO `comment` (`id`, `user_id`, `post_id`, `description`, `date`) VALUES
(20, 16, 1, 'Поздравляю с дебютом! Мой первый концерт был в школьном ансамбле. Очень нервничал, но зрители поддерживали. Главное — получать удовольствие от игры и не бояться ошибиться. Это часть процесса!', '2024-06-16'),
(21, 17, 1, ' Круто, что всё прошло гладко! Я играл на свадьбе друга, и это был мой первый опыт на сцене. Держал гитару крепче, чем обычно, от волнения. Советую перед выходом на сцену делать дыхательные упражнения, это помогает успокоиться.', '2024-06-16'),
(22, 18, 11, 'Посмотри на модели от Boss Katana. Они универсальны и имеют множество встроенных эффектов, что удобно для записи в домашних условиях.', '2024-06-16'),
(23, 18, 12, 'Начни с основных: G, C, D и Em. Они часто встречаются в простых песнях. Важно не только выучить их, но и уметь быстро менять аккорды. Потренируй переходы между ними медленно, постепенно увеличивая скорость.', '2024-06-16'),
(24, 17, 12, 'Можно попробовать A и E — они тоже несложные. Я советую тренировать аккорды под метроном, это помогает развить ритм и скорость. Также попробуй использовать аппликатор для пальцев, чтобы улучшить растяжку и силу рук.', '2024-06-16');

-- --------------------------------------------------------

--
-- Структура таблицы `comment_courses`
--

CREATE TABLE `comment_courses` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `courses_id` int NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `likes_count` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `comment_courses`
--

INSERT INTO `comment_courses` (`id`, `user_id`, `courses_id`, `description`, `date`, `likes_count`) VALUES
(2, 16, 3, 'Отличный курс!!!', '2024-06-02', 26);

-- --------------------------------------------------------

--
-- Структура таблицы `courses`
--

CREATE TABLE `courses` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `photo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `price` varchar(255) NOT NULL,
  `comment_courses_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `courses`
--

INSERT INTO `courses` (`id`, `name`, `description`, `photo`, `price`, `comment_courses_id`) VALUES
(3, 'Мастерство Музыкальной Импровизации', 'Погрузитесь в мир музыкальной импровизации с нашим курсом, созданным для музыкантов всех уровней. Узнайте, как создавать уникальные мелодии на ходу, развивайте свой слух и интуицию, овладейте техниками импровизации в различных стилях. Наши опытные преподаватели помогут вам раскрыть ваш творческий потенциал и стать уверенным исполнителем. Присоединяйтесь к нам и начните своё музыкальное путешествие сегодня!\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'uploads/teacher1.jpg', '5,499 ₽', NULL),
(4, 'Современные Техники Музыкальной Композиции', 'Откройте для себя секреты создания захватывающих музыкальных произведений с нашим курсом по современным техникам композиции. Изучите принципы гармонии, мелодии и ритма, овладейте новейшими методами аранжировки и звукового дизайна. Наши эксперты помогут вам развить уникальный стиль и научат использовать профессиональные инструменты для создания музыки. Присоединяйтесь и превратите свои музыкальные идеи в настоящие шедевры!', 'uploads/guitarLink.jpg', '6999', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `lesson`
--

CREATE TABLE `lesson` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `brief` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `video_url` varchar(500) NOT NULL,
  `video_name` varchar(255) NOT NULL,
  `likes_count` int NOT NULL DEFAULT '0',
  `visits_count` int NOT NULL DEFAULT '0',
  `lesson_preview_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `lesson`
--

INSERT INTO `lesson` (`id`, `name`, `brief`, `subtitle`, `description`, `date`, `video_url`, `video_name`, `likes_count`, `visits_count`, `lesson_preview_id`) VALUES
(7, 'Знакомство с гитарой', 'Изучение частей гитары и базовая настройка для чистого и гармоничного звучания.', 'Основные части гитары и настройка', 'Добро пожаловать на первый урок нашего курса \"Первые шаги в освоении гитары\"! В этом уроке мы познакомимся с основными частями гитары и научимся ее настраивать. Вы узнаете, из каких частей состоит гитара, как правильно держать инструмент, и какие аксессуары могут понадобиться. Мы также подробно рассмотрим процесс настройки гитары, чтобы вы могли всегда звучать чисто и гармонично. Этот урок станет важным фундаментом для дальнейшего изучения и освоения гитары.', '2024-06-01', 'https://www.youtube.com/watch?v=1_MGdLZgI7I', 'Как начать играть на гитаре?', 0, 5, 1),
(8, 'Основные аккорды: C, G, и D', 'Изучите аккорды C, G, и D, которые являются основой многих популярных песен.', 'Овладение базовыми аккордами', 'Во втором уроке мы познакомимся с тремя важными аккордами: C, G и D. Эти аккорды часто встречаются в множестве песен и являются ключевыми элементами вашего музыкального арсенала. Мы рассмотрим правильное положение пальцев, научимся плавно переходить между этими аккордами и разберем простые упражнения для закрепления навыков. Регулярная практика этих аккордов поможет вам почувствовать себя более уверенно при игре на гитаре.', '2024-06-03', 'https://www.youtube.com/watch?v=v_fgmzjPzlo', 'Основные аккорды', 0, 3, 1),
(9, 'Основные ритмы и техника правой руки', 'Освойте базовые ритмические паттерны и технику игры правой рукой для более выразительной игры.', 'Развитие ритмических навыков', 'В третьем уроке мы сосредоточимся на развитии техники игры правой рукой и изучении базовых ритмических паттернов. Вы узнаете, как правильно держать медиатор, как чередовать удары вниз и вверх, а также освоите несколько простых ритмов, которые можно использовать с аккордами, изученными в предыдущем уроке. Эти упражнения помогут вам почувствовать ритм и улучшить координацию между руками, что является важным шагом в вашем гитарном путешествии.', '2024-06-06', 'https://www.youtube.com/watch?v=T3cofZ0HqKE', 'Основные ритмы на гитаре ', 0, 4, 1),
(10, 'Интервалы: Строение и определение', 'В этом уроке мы разберем интервалы, расстояния между двумя нотами, и их влияние на гармонию в музыке. Вы научитесь определять и распознавать основные интервалы на слух и на письме.', 'Понимание интервалов', 'Интервалы - это расстояния между двумя нотами, которые играют ключевую роль в создании гармонии и мелодии в музыке. Интервалы бывают разных типов: большие, малые, чистые, увеличенные и уменьшенные. Например, расстояние между нотой До и Ре называется большим секундам, а между До и Ми - большим терциям. Понимание интервалов помогает музыкантам сочинять музыку, импровизировать и анализировать музыкальные произведения. В этом уроке мы изучим, как измерять интервалы, как они звучат и как их распознавать. Мы также рассмотрим примеры использования интервалов в различных музыкальных жанрах и произведениях.', '2024-06-14', 'https://www.youtube.com/watch?v=UZzSbO37hys', 'Теория музыки по-пацански с нуля', 0, 1, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `lesson_preview`
--

CREATE TABLE `lesson_preview` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `lesson_preview`
--

INSERT INTO `lesson_preview` (`id`, `name`, `description`, `photo`) VALUES
(1, 'Первые шаги в освоении гитары', 'Этот цикл уроков \"Первые шаги в освоении гитары\" идеально подходит для начинающих. Вы узнаете основные аккорды, технику игры и базовые приемы. Шаг за шагом мы пройдем через фундаментальные элементы, чтобы помочь вам уверенно овладеть инструментом и начать исполнять свои первые мелодии. Погрузитесь в мир музыки с нашим легким и увлекательным курсом!', 'uploads/forumLink.jpg'),
(2, 'Основы сольфеджио: Понимание музыкальной теории', 'В этом цикле уроков вы познакомитесь с основами сольфеджио, научитесь распознавать музыкальные ноты, интервалы, аккорды и ритмы. Эти знания помогут вам лучше понимать музыкальные произведения и улучшат ваши навыки исполнения. Цикл подходит как для начинающих, так и для тех, кто хочет освежить свои знания.', 'uploads/SolfLink.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1716581150),
('m240524_200519_User_table', 1716581155);

-- --------------------------------------------------------

--
-- Структура таблицы `post`
--

CREATE TABLE `post` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `category_id` int NOT NULL,
  `comment_id` int DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `visits_count` int NOT NULL DEFAULT '0',
  `post_video_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `post`
--

INSERT INTO `post` (`id`, `user_id`, `category_id`, `comment_id`, `name`, `description`, `date`, `visits_count`, `post_video_url`) VALUES
(1, 13, 1, 1, 'Первый концерт с гитарой!', 'Привет, гитаристы! Вчера у меня был первый концерт с гитарой перед небольшой аудиторией. Это было незабываемо! Волновался, но в итоге сыграл без ошибок. А как прошел ваш первый концерт? Поделитесь своими историями и советами, как справиться с волнением на сцене.', '2024-05-01', 12, 'https://www.youtube.com/watch?v=gGdksYc13ag'),
(11, 17, 2, NULL, 'Лучшие усилители для домашней студии', 'Всем привет! Решил обустроить домашнюю студию и выбрать хороший усилитель для гитары. Какие модели вы бы порекомендовали для записи дома? Важно, чтобы звук был чистым и насыщенным. Буду рад вашим советам и отзывам!', '2024-06-16', 2, 'https://www.youtube.com/watch?v=cJnoKx6TBSg'),
(12, 16, 3, NULL, 'Простые аккорды для новичков', 'Привет, друзья! Я только начал изучать гитару и уже столкнулся с первой трудностью — освоением аккордов. Я слышал, что есть несколько базовых аккордов, с которых стоит начать, но когда попробовал их выучить, оказалось, что это не так просто, как казалось на первый взгляд. Пальцы не всегда слушаются, переходы между аккордами даются с трудом, и звучание не всегда такое чистое, как хотелось бы.\r\n\r\nМожет быть, кто-то из вас уже прошел через этот этап и может дать несколько советов? Какие аккорды действительно стоит освоить в первую очередь? Может, есть какие-то упражнения или техники, которые помогут быстрее и эффективнее научиться переставлять пальцы и улучшить звучание? Также буду очень признателен за табулатуры или ссылки на полезные ресурсы для начинающих.\r\n\r\nЯ очень хочу научиться играть свои любимые песни и радовать друзей и семью. Буду благодарен за любую помощь и поддержку от более опытных гитаристов. Спасибо!', '2024-06-16', 3, '');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `email`, `username`, `password`, `role`) VALUES
(13, 'admin@mail.ru', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(16, 'maks@mail.ru', 'ninermZzz', '4297f44b13955235245b2497399d7a93', 0),
(17, 'test@mail.ru', 'GuitarProoo', '4297f44b13955235245b2497399d7a93', 0),
(18, 'retro@mail.ru', 'Инди_музыкант', '4297f44b13955235245b2497399d7a93', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `user_bookmarks`
--

CREATE TABLE `user_bookmarks` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `lesson_id` int NOT NULL,
  `at_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `user_bookmarks`
--

INSERT INTO `user_bookmarks` (`id`, `user_id`, `lesson_id`, `at_created`) VALUES
(23, 13, 7, '2024-06-01 20:03:44'),
(24, 16, 7, '2024-06-01 21:10:54'),
(26, 16, 8, '2024-06-15 10:36:00');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`,`post_id`),
  ADD KEY `user_id_2` (`user_id`,`post_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Индексы таблицы `comment_courses`
--
ALTER TABLE `comment_courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courses_id` (`courses_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_courses_id` (`comment_courses_id`);

--
-- Индексы таблицы `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lesson_preview_id` (`lesson_preview_id`);

--
-- Индексы таблицы `lesson_preview`
--
ALTER TABLE `lesson_preview`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`user_id`,`category_id`,`comment_id`),
  ADD KEY `id_category` (`category_id`),
  ADD KEY `id_coment` (`comment_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`,`username`);

--
-- Индексы таблицы `user_bookmarks`
--
ALTER TABLE `user_bookmarks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`user_id`),
  ADD KEY `id_lesson` (`lesson_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `comment_courses`
--
ALTER TABLE `comment_courses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `lesson`
--
ALTER TABLE `lesson`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `lesson_preview`
--
ALTER TABLE `lesson_preview`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `post`
--
ALTER TABLE `post`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `user_bookmarks`
--
ALTER TABLE `user_bookmarks`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `comment_courses`
--
ALTER TABLE `comment_courses`
  ADD CONSTRAINT `comment_courses_ibfk_1` FOREIGN KEY (`courses_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_courses_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`comment_courses_id`) REFERENCES `comment_courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `lesson`
--
ALTER TABLE `lesson`
  ADD CONSTRAINT `lesson_ibfk_1` FOREIGN KEY (`lesson_preview_id`) REFERENCES `lesson_preview` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `user_bookmarks`
--
ALTER TABLE `user_bookmarks`
  ADD CONSTRAINT `user_bookmarks_ibfk_1` FOREIGN KEY (`lesson_id`) REFERENCES `lesson` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_bookmarks_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
