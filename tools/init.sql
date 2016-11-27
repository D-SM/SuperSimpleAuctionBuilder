SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


--
-- Baza danych: `ssa_100002`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `auction`
--

CREATE TABLE `auction` (
  `a_id` int(60) NOT NULL,
  `a_admin_name` varchar(60) NOT NULL,
  `a_admin_surname` varchar(60) NOT NULL,
  `a_title` varchar(60) NOT NULL,
  `a_end_date` text NOT NULL,
  `a_end_together` tinyint(1) DEFAULT NULL,
  `a_admin_pass` varchar(200) NOT NULL,
  `a_admin_email` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `bidding_history`
--

CREATE TABLE `bidding_history` (
  `b_i_id` int(60) NOT NULL,
  `b_bid` int(70) NOT NULL,
  `b_date` text NOT NULL,
  `b_u_id` int(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `favourite`
--

CREATE TABLE `favourite` (
  `f_u_id` int(60) NOT NULL,
  `f_i_id` int(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `image`
--

CREATE TABLE `image` (
  `img_i_id` int(60) NOT NULL,
  `img_url` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `item`
--

CREATE TABLE `item` (
  `i_id` int(60) NOT NULL,
  `i_u_id` int(60) NOT NULL,
  `i_title` text NOT NULL,
  `i_description` text NOT NULL,
  `i_price` int(100) NOT NULL,
  `i_u_id_winner` int(60) NOT NULL,
  `i_end_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `role`
--

CREATE TABLE `role` (
  `r_id` int(60) NOT NULL,
  `r_name` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `u_id` int(60) NOT NULL,
  `u_name` varchar(70) NOT NULL,
  `u_surname` varchar(70) NOT NULL,
  `u_email` varchar(150) NOT NULL,
  `u_password` varchar(200) NOT NULL,
  `u_role` int(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
