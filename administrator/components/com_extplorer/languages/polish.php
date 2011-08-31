<?php
// $Id: polish.php 149 2009-06-21 18:44:27Z soeren $
// Polish Language Module for v2.3 (translated by l0co@wp.pl)
global $_VERSION;

$GLOBALS["charset"] = "UTF-8";
$GLOBALS["text_dir"] = "ltr"; // ('ltr' for left to right, 'rtl' for right to left)
$GLOBALS["date_fmt"] = "Y/m/d H:i";
$GLOBALS["error_msg"] = array(
	// error
	"error"			=> "Blad",
	"message"	=> "Komunikat(y)",
	"back"			=> "Wróc",

	// root
	"home"			=> "Katalog domowy nie istnieje. Sprawdz swoje ustawienia.",
	"abovehome"		=> "Biezacy katalog nie moze byc powyzej katalogu domowego.",
	"targetabovehome"	=> "Docelowy katalog nie moze byc powyzej katalogu domowego.",

	// exist
	"direxist"		=> "Katalog nie istnieje.",
	//"filedoesexist"	=> "This file already exists.",
	"fileexist"		=> "Plik nie istnieje.",
	"itemdoesexist"		=> "Element juz istnieje.",
	"itemexist"		=> "Element nie istnieje.",
	"targetexist"		=> "Katalog docelowy nie istnieje.",
	"targetdoesexist"	=> "Miejsce docelowe juz istnieje.",

	// open
	"opendir"		=> "Nie mozna otworzyc katalogu.",
	"readdir"		=> "Nie mozna odczytac katalogu.",

	// access
	"accessdir"		=> "Nie masz prawa dostepu do tego katalogu.",
	"accessfile"		=> "Nie masz prawa dostepu do tego pliku.",
	"accessitem"		=> "Nie masz prawa dostepu do tego elementu.",
	"accessfunc"		=> "Nie masz prawa uzyc tej funkcji.",
	"accesstarget"		=> "Nie masz prawa dostepu do docelowego katalogu.",

	// actions
	"permread"		=> "Pobieranie uprawnie&#324; nie powiodlo sie.",
	"permchange"		=> "Blad CHMOD (zazwyczaj spowodowane jest to problemem z ustawieniami wla&#347;ciciela pliku - np. je&#347;li uzytkownik HTTP ('www-data' lub 'nobody') i uzytkownik FTP nie sa tymi samymi uzytkownikami)",
	"openfile"		=> "Otwarcie pliku nie powiodlo sie.",
	"savefile"		=> "Zapisanie pliku nie powiodlo sie.",
	"createfile"		=> "Utworzenie pliku nie powiodlo sie.",
	"createdir"		=> "Utworzenie katalogu nie powiodlo sie.",
	"uploadfile"		=> "Upload pliku nie powiódl sie.",
	"copyitem"		=> "Kopiowanie nie powiodlo sie.",
	"moveitem"		=> "Przenoszenie nie powiodlo sie.",
	"delitem"		=> "Usuwanie nie powiodlo sie.",
	"chpass"		=> "Zmiana nazwa nie powiodla sie.",
	"deluser"		=> "Usuwanie uzytkownika nie powiodlo sie.",
	"adduser"		=> "Dodawanie uzytkownika nie powiodlo sie.",
	"saveuser"		=> "Zapisywanie uzytkownika nie powiodlo sie.",
	"searchnothing"		=> "Musisz wpisac fraze wyszukiwania.",

	// misc
	"miscnofunc"		=> "Funkcja nie jest dostepna.",
	"miscfilesize"		=> "Plik przekracza maksymalna wielko&#347;c.",
	"miscfilepart"		=> "Plik zostal zaladowany tylko cze&#347;ciowo.",
	"miscnoname"		=> "Musisz wpisac nazwe.",
	"miscselitems"		=> "Nie wybrale&#347; zadnych elementów.",
	"miscdelitems"		=> "Na pewno chcesz usunac {0} element(ów)?",
	"miscdeluser"		=> "Na pewno chcesz usunac uzytkownika '{0}'?",
	"miscnopassdiff"	=> "Nowe haslo nie rózni sie od biezacego.",
	"miscnopassmatch"	=> "Haslo nie pasuje.",
	"miscfieldmissed"	=> "Nie wypelnile&#347; waznego pola.",
	"miscnouserpass"	=> "Nieprawidlowe haslo lub nazwa uzytkownika.",
	"miscselfremove"	=> "Nie mozesz usunac sam siebie.",
	"miscuserexist"		=> "Uzytkownik juz istnieje.",
	"miscnofinduser"	=> "Nie znaleziono uzytkownika.",
	"extract_noarchive" => "Plik nie jest archiwum mozliwym do rozpakowania.",
	"extract_unknowntype" => "Nieznany typ archiwum",
	
	'chmod_none_not_allowed' => 'Zmiana uprawnie&#324; na <none> nie jest dopuszczalna',
	'archive_dir_notexists' => 'Docelowy katalog zapisu, który wybrale&#347;, nie istnieje.',
	'archive_dir_unwritable' => 'Prosze wybrac katalog z prawami do zapisu archiwum.',
	'archive_creation_failed' => 'Zapis archiwum nie powiódl sie'
	
);
$GLOBALS["messages"] = array(
	// links
	"permlink"		=> "Zmiana uprawnie&#324;",
	"editlink"		=> "Edycja",
	"downlink"		=> "Download",
	"uplink"		=> "W góre",
	"homelink"		=> "Katalog domowy",
	"reloadlink"		=> "Od&#347;wiez",
	"copylink"		=> "Kopiuj",
	"movelink"		=> "Przenie&#347;",
	"dellink"		=> "Usu&#324;",
	"comprlink"		=> "Archiwum",
	"adminlink"		=> "Administrator",
	"logoutlink"		=> "Wyloguj",
	"uploadlink"		=> "Upload",
	"searchlink"		=> "Wyszukaj",
	"extractlink"	=> "Rozpakuj archiwum",
	'chmodlink'		=> 'Zmie&#324; uprawnienia (chmod)', // new mic
	'mossysinfolink'	=> 'Informacje o systemie', // new mic
	'logolink'		=> 'Skocz do strony joomlaXplorer (nowe okno)', // new mic

	// list
	"nameheader"		=> "Nazwa",
	"sizeheader"		=> "Rozmiar",
	"typeheader"		=> "Typ",
	"modifheader"		=> "Zmodyfikowano",
	"permheader"		=> "Prawa",
	"actionheader"		=> "Akcje",
	"pathheader"		=> "Ściezka",

	// buttons
	"btncancel"		=> "Anuluj",
	"btnsave"		=> "Zapisz",
	"btnchange"		=> "Zmie&#324;",
	"btnreset"		=> "Resetuj",
	"btnclose"		=> "Zamknij",
	"btncreate"		=> "Utwórz",
	"btnsearch"		=> "Szukaj",
	"btnupload"		=> "Upload",
	"btncopy"		=> "Kopiuj",
	"btnmove"		=> "Przenie&#347;",
	"btnlogin"		=> "Zaloguj",
	"btnlogout"		=> "Wyloguj",
	"btnadd"		=> "Dodaj",
	"btnedit"		=> "Edytuj",
	"btnremove"		=> "Usu&#324;",
	
	// user messages, new in joomlaXplorer 1.3.0
	'renamelink'	=> 'Zmie&#324; nazwe',
	'confirm_delete_file' => 'Na pewno chcesz usunac ten plik? <br />%s',
	'success_delete_file' => 'Element(y) zostaly poprawnie usuniete.',
	'success_rename_file' => 'Nazwa katalog/plik %s zostala zmieniona na %s.',
	
	// actions
	"actdir"		=> "Katalog",
	"actperms"		=> "Zmiana praw",
	"actedit"		=> "Edycja pliku",
	"actsearchresults"	=> "Wyniki szukania",
	"actcopyitems"		=> "Kopiowanie element(ów)",
	"actcopyfrom"		=> "Kopiowanie z /%s do /%s ",
	"actmoveitems"		=> "Przenoszenie element(ów)",
	"actmovefrom"		=> "Przenoszenie z /%s do /%s ",
	"actlogin"		=> "Zaloguj",
	"actloginheader"	=> "Zaloguj sie aby uzywac managera plików",
	"actadmin"		=> "Administracja",
	"actchpwd"		=> "Zmiana hasla",
	"actusers"		=> "Uzytkownicy",
	"actarchive"		=> "Archiwizacja element(ów)",
	"actupload"		=> "Upload plik(ów)",

	// misc
	"miscitems"		=> "Element(y)",
	"miscfree"		=> "Wolny",
	"miscusername"		=> "Nazwa uzytkownika",
	"miscpassword"		=> "Haslo",
	"miscoldpass"		=> "Poprzednie haslo",
	"miscnewpass"		=> "Nowe haslo",
	"miscconfpass"		=> "Potwierdz haslo",
	"miscconfnewpass"	=> "Potwierdz nowe haslo",
	"miscchpass"		=> "Zmie&#324; haslo",
	"mischomedir"		=> "Katalog domowy",
	"mischomeurl"		=> "Domowy adres URL",
	"miscshowhidden"	=> "Pokazuj elementy ukryte",
	"mischidepattern"	=> "Maska elementów ukrytych",
	"miscperms"		=> "Uprawnienia",
	"miscuseritems"		=> "(nazwa, katalog domowy, pokazywanie ukrytych elementów, uprawnienia, aktywno&#347;c)",
	"miscadduser"		=> "dodaj uzytkownika",
	"miscedituser"		=> "edycja uzytkownika '%s'",
	"miscactive"		=> "Aktywny",
	"misclang"		=> "Jezyk",
	"miscnoresult"		=> "Brak rezultatów.",
	"miscsubdirs"		=> "Przeszukaj podkatalogi",
	"miscpermnames"		=> array("Tylko przegladaj","Modyfikuj","Zmie&#324; haslo","Modyfikuj i zmie&#324; haslo",
					"Administrator"),
	"miscyesno"		=> array("Tak","Nie","T","N"),
	"miscchmod"		=> array("Wla&#347;ciciel", "Grupa", "Pozostali"),

	// from here all new by mic
	'miscowner'			=> 'Wla&#347;ciciel',
	'miscownerdesc'		=> '<strong>Opis:</strong><br />Uzytkownik (UID) /<br />Grupa (GID)<br />Prawa:<br /><strong> %s ( %s ) </strong>/<br /><strong> %s ( %s )</strong>',

	// sysinfo (new by mic)
	'simamsysinfo'		=> "Informacje o systemie",
	'sisysteminfo'		=> 'Informacja o systemie',
	'sibuilton'			=> 'System operacyjny',
	'sidbversion'		=> 'Wersja bazy danych',
	'siphpversion'		=> 'Wersja PHP',
	'siphpupdate'		=> 'INFORMACJA: <span style="color: red;">Uzywana przez Ciebie wersja PHP <strong>nie</strong> jest aktualna!</span><br />Je&#347;li chcesz aby wszystkie funkcje i dodatki Mambo dzialaly poprawnie,<br />musisz uzywac minimum wersji <strong>PHP 4.3</strong>!',
	'siwebserver'		=> 'Serwer web',
	'siwebsphpif'		=> 'Serwer web - interfejs PHP',
	'simamboversion'	=> 'Wersja eXtplorer\'a',
	'siuseragent'		=> 'Wersja przegladarki',
	'sirelevantsettings' => 'Wazne ustawienia PHP',
	'sisafemode'		=> 'Safe Mode',
	'sibasedir'			=> 'Open basedir',
	'sidisplayerrors'	=> 'PHP Errors',
	'sishortopentags'=> 'Short Open Tags',
	'sifileuploads'		=> 'File Uploads',
	'simagicquotes'	=> 'Magic Quotes',
	'siregglobals'		=> 'Register Globals',
	'sioutputbuf'		=> 'Output Buffer',
	'sisesssavepath'	=> 'Session Savepath',
	'sisessautostart'	=> 'Session auto start',
	'sixmlenabled'		=> 'XML enabled',
	'sizlibenabled'		=> 'ZLIB enabled',
	'sidisabledfuncs'	=> 'Niekatywne funkcje',
	'sieditor'				=> 'Edytor WYSIWYG',
	'siconfigfile'		=> 'Plik konfiguracyjny',
	'siphpinfo'			=> 'PHP Info',
	'siphpinformation'	=> 'Informacje o PHP',
	'sipermissions'		=> 'Prawa',
	'sidirperms'		=> 'Prawa katalogu',
	'sidirpermsmess'	=> 'Aby zapewnic poprawne dzialanie wszystkich funkcji eXtplorer\'a, nastepujace katalogi powinny miec ustawione prawa pisania [chmod 0777]',
	'sionoff'			=> array( 'Wl', 'Wyl' ),
	
	'extract_warning' => "Czy na pewno chcesz rozpakowac ten plik tutaj?<br />Moze to spowodowac nadpisanie istniejacych plików!",
	'extract_success' => "Rozpakowanie powiodlo sie",
	'extract_failure' => "Rozpakowanie nie powiodlo sie",
	
	'overwrite_files' => 'Nadpisac istniejace pliki?',
	"viewlink"		=> "Podglad",
	"actview"		=> "Pokaz zródlo pliku",
	
	// added by Paulino Michelazzo (paulino@michelazzo.com.br) to fun_chmod.php file
	'recurse_subdirs'	=> 'Ustaw dla wszystkich podkatalogów?',
	
	// added by Paulino Michelazzo (paulino@michelazzo.com.br) to footer.php file
	'check_version'	=> 'Sprawdz ostatnia wersje',
	
	// added by Paulino Michelazzo (paulino@michelazzo.com.br) to fun_rename.php file
	'rename_file'	=>	'Zmie&#324; nazwe katalogu lub pliku...',
	'newname'		=>	'Nowa nazwa',
	
	// added by Paulino Michelazzo (paulino@michelazzo.com.br) to fun_edit.php file
	'returndir'	=>	'Powrócic do katalogu po zapisaniu?',
	'line'		=> 	'Linia',
	'column'	=>	'Kolumna',
	'wordwrap'	=>	'Zawijanie wierszy: (tylko IE)',
	'copyfile'	=>	'Skopiuj plik pod ta nazwa',
	
	// Bookmarks
	'quick_jump' => 'Szybki skok do',
	'already_bookmarked' => 'Dla tego katalogu juz istnieje zakladka',
	'bookmark_was_added' => 'Katalog zostal dodany do zakladek.',
	'not_a_bookmark' => 'Katalog nie jest zakladka.',
	'bookmark_was_removed' => 'Katalog zostal usuniety z zakladek.',
	'bookmarkfile_not_writable' => "Nie powiodlo sie dodanie do zakladek %s.\n Plik zakladek '%s' \nnie ma ustawionych praw do zapisu.",
	
	'lbl_add_bookmark' => 'Dodaj katalog jako zakladke',
	'lbl_remove_bookmark' => 'Usu&#324; katalog z listy zakladek',
	
	'enter_alias_name' => 'Wpisz alias dla zakladki',
	
	'normal_compression' => 'kompresja normalna (normal)',
	'good_compression' => 'kompresja dobra (good)',
	'best_compression' => 'kompresja najlepsza (best)',
	'no_compression' => 'brak kompresji',
	
	'creating_archive' => 'Tworzenie archiwum...',
	'processed_x_files' => 'Przetworzono %s z %s plików',
	
	'ftp_header' => 'Lokalna autoryzacja FTP',
	'ftp_login_lbl' => 'Prosze podac dane dostepowe do serwera FTP',
	'ftp_login_name' => 'Nazwa uzytkownika',
	'ftp_login_pass' => 'Haslo',
	'ftp_hostname_port' => 'Serwer i port FTP <br />(port opcjonalnie)',
	'ftp_login_check' => 'Sprawdzanie polaczenia FTP...',
	'ftp_connection_failed' => "Nie mozna polaczyc sie z serwerem FTP. \nProsze sprawdzic, czy serwer FTP jest aktywny na podanym ho&#347;cie.",
	'ftp_login_failed' => "Nie mozna zalogowac sie do serwera FTP. Prosze zweryfikowac poprawno&#347;c nazwy uzytkownika i hasla i spróbowac ponownie.",
		
	'switch_file_mode' => 'Aktualny tryb: <strong>%s</strong>. Mozesz przelaczyc sie do trybu %s.',
	'symlink_target' => 'Punkt docelowy linku symbolicznego',
	
	"permchange"		=> "Zmiana uprawnie&#324; (chmod) powiodla sie:",
	"savefile"		=> "Plik zostal zapisany.",
	"moveitem"		=> "Przenoszenie powiodlo sie.",
	"copyitem"		=> "Kopiowanie powiodlo sie.",
	'archive_name' 	=> 'Nazwa pliku archiwum',
	'archive_saveToDir' 	=> 'Zapisz archiwum do katalogu',
	
	'editor_simple'	=> 'Tryb edytora: prosty',
	'editor_syntaxhighlight'	=> 'Tryb edytora: wyróznianie skladni',

	'newlink'	=> 'Nowy plik/katalog',
	'show_directories' => 'Pokaz katalogi',
	'actlogin_success' => 'Uzytkownik zostal zalogowany!',
	'actlogin_failure' => 'Nieprawidlowy login badz haslo. Spróbuj ponownie',
	'directory_tree' => 'Drzewko katalogów',
	'browsing_directory' => 'Przegladany katalog',
	'filter_grid' => 'Filtr',
	'paging_page' => 'Strona',
	'paging_of_X' => 'z {0}',
	'paging_firstpage' => 'Pierwsza strona',
	'paging_lastpage' => 'Ostatnia strona',
	'paging_nextpage' => 'Nastepna strona',
	'paging_prevpage' => 'Poprzednia strona',
	
	'paging_info' => 'Wy&#347;wietlane elementy: {0} - {1} z {2}',
	'paging_noitems' => 'Brak elementów do wy&#347;wietlenia',
	'aboutlink' => 'O...',
	'password_warning_title' => 'Wazne - zmie&#324; swoje haslo!',
	'password_warning_text' => 'Konto uzytkownika do którego wla&#347;nie sie zalogowale&#347; (admin z haslem admin) odpowiada domy&#347;lnym ustawieniom przegladarki. To sprawia, ze potencjalnie kazdy moze zalogowac sie do Twojego konta administratora. Aby naprawic ten problem, zmie&#324; haslo administratora na swoje prywatne haslo!',
	'change_password_success' => 'Haslo zostalo zmienione.',
	'success' => 'Sukces',
	'failure' => 'Blad',
	'dialog_title' => 'Onko dialogowe',
	'upload_processing' => 'Upload plików, prosze czekac...',
	'upload_completed' => 'Upload plików powiódl sie!',
	'acttransfer' => 'Transfer z innego serwera',
	'transfer_processing' => 'Transfer plików serwer-do-serwera, prosze czekac...',
	'transfer_completed' => 'Zako&#324;czono transfer!',
	'max_file_size' => 'Maksymalny rozmiar pliku',
	'max_post_size' => 'Maksymalny limit uploadu',
	'done' => 'Zako&#324;czono.',
	'permissions_processing' => 'Trwa zastosowywanie uprawnie&#324;, prosze czekac...',
	'archive_created' => 'Plik archiwum zostal utworzony.',
	'save_processing' => 'Zapis pliku...',
	'current_user' => 'Skrypt aktualnie jest wykonywany z prawami nastepujacego uzytkownika:',
	'your_version' => 'Twoja wersja',
	'search_processing' => 'Wyszukiwanie, prosze czekac...',
	'url_to_file' => 'Adres URL pliku',
	'file' => 'Plik'
	
);
?>
