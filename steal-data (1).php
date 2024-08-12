<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="icons.js" defer ></script>
    <script type="text/javascript" src="public/js/Lab8/downloadFileAndRedirect.js" defer ></script>
    <title>Remote Code Execution</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="public/css/main_style.css">
    <link rel="stylesheet" href="public/css/main_container.css">
</head>
<body>

        <header>
    <h1 id="logo">VulnLab</h1>
</header>
<nav>
    <ul>
        <li><a href="/Lab1_FirstTask">A01:2021 - Broken Access Control</a></li>
        <li><a href="/Lab2_Lab3_FirstTask">A02:2021 - Injection</a></li>
        <li><a href="/Lab2_Lab3_FirstTask">A03:2021 - Cryptographic Failures</a></li>
        <li><a href="/Lab4_FirstTask">A04:2021 - Insecure Design</a></li>
        <li><a href="/Lab5_Lab10_FirstTask">A05:2021 - Security Misconfiguration </a></li>
        <li><a href="/Lab6_FirstTask">A06:2021 - Vulnerable and Outdated Components</a></li>
        <li><a href="/Lab7_Lab9_FirstTask">A07:2021 - Identification and Authentication Failures</a></li>
        <li><a  class= "active" href="/Lab8_FirstTask">A08:2021 - Software and Data Integrity Failures</a></li>
        <li><a href="/Lab7_Lab9_FirstTask">A09:2021 - Security Logging And Monitoring Failures</a></li>
        <li><a href="/Lab5_Lab10_FirstTask">A10:2021 - Server-Side Request Forgery (SSRF)</a></li>
    </ul>
</nav>






    <article>
        <section>  
                    <h2><i class="fas fa-book-open" id="bookIconOneOwasp"></i> A08:2021 - Software and Data Integrity Failure</h2>
        <i class="bookIconOneOwasp">Problemy z integralnością danych pojawiają się, gdy pliki wykonywalne oprogramowania nie są odpowiednio sprawdzane pod kątem ich autentyczności i integralności. Oznacza to, że oprogramowanie może zostać zmodyfikowane, uszkodzone lub zainfekowane złośliwym kodem, a system nie wykryje tych zmian. Brak weryfikacji integralności plików prowadzi do sytuacji, w której zainstalowane oprogramowanie może działać nieprawidłowo lub być wykorzystane przez atakujących do przeprowadzenia ataków.</i>
        <hr width="50%" align="center">
        <br>
        <h3>Cel laboratorium</h3>
        <p>Twoim zadaniem jest odkrycie, jak atakujący może wykorzystać złośliwą bibliotekę JavaScript 
        <br>do kradzieży wrażliwych danych użytkownika, takich jak adres e-mail czy numer karty kredytowej, za pomocą funkcji eval. 
        <br>W tym laboratorium będziesz badać, jak podatność na zdalne wykonanie kodu (Remote Code Execution) 
        <br>w nieprawidłowo zabezpieczonej bibliotece może być wykorzystana do przeprowadzenia ataku.
        </p>
        <br>
        <h3>Ataki do wykonania</h3>
        <p><i class="fas fa-book-open" id="bookIconOneAttack"></i> Remote Code Execution (RCE)</p>
        <i class="bookIconOneAttack">Remote Code Execution (RCE) to atak, w którym atakujący wykorzystuje lukę w oprogramowaniu do zdalnego wykonania dowolnego kodu na serwerze lub komputerze ofiary.</i>
        <hr width="50%" align="center">
        <br>
        <h3>Wadliwy kod - Software and Data Integrity Failures</h3>
        <p>Wskazany fragment kodu demonstruje wczytanie zewnętrznego pliku JavaScript z niesprawdzonego źródła. </p>
        <img src="public/img/Lab8/rce.png" alt="Nazwafirmy">
        <br>
        <p>Programista pewnej firmy potrzebował szybko zaimplementować walidację dla adresu e-mail oraz numeru karty kredytowej w utworzonym formularzu. 
        <br>Z powodu ograniczonego czasu na testowanie, zdecydował się na użycie funkcji validate() pochodzącej z niesprawdzonej biblioteki.</p>
        </p>
        <img src="public/img/Lab8/rce2.png" alt="Nazwafirmy">
        <p><strong>Jakie potencjalne konsekwencje mogą wyniknąć z decyzji programisty o użyciu funkcji validate() z niesprawdzonej biblioteki,
        <br> biorąc pod uwagę brak dokładnego testowania rozwiązania?</strong></p>
        <br>
        <br>
        <hr width="50%" align="center">
        <br>

        <h1>Przeprowadzenie ataku</h1>
        <p>Skrypt <strong>steal-data.php</strong> służy do wykradania danych z przesłanego formularza. 
        <br>W tym celu obsługuje żądania typu POST, odczytując dane z ciała żądania w formacie JSON. 
        <br>Po zdekodowaniu JSON-a na tablicę PHP, skrypt wyciąga adres e-mail i numer karty kredytowej,
        <br>a następnie zapisuje te dane do pliku tekstowego <strong>stolen-data.txt</strong>.</p>
        <br><br>W celu przeprowadzenia ataku wykonaj poniższe kroki:

        <ul class="attack_steps">
                <li class="task">
                <span class="icon">&#10003;</span>
                <span id="loupeIconFirstTask" class="hint-icon">&#128269;</span>
                <span class="text left-align"><strong>1.</strong> Pobierz plik steal-data.php, a następnie umieść go na dowolnym serwerze. 
                <br>W przygotowanej wadliwej bibliotece zaktualizuj adres serwera, na którym umieściłeś 
                <br>skrypt wykradający dane. Jako ofiara, kliknij przycisk "Submit", aby przesłać ukryte dane. 
                <br>Po pomyślnym ataku wpisz wykradnięty e-mail i numer karty w odpowiednim miejscu.</span>
                </li>
                <p class="firstTaskDescription">Aby wykonać atak musisz umieścić pobrany plik steal-data.php na swoim serwerze.<br>Przykładowy url, jak może wyglądać: "http://localhost:8080/steal-data.php".<br>Po kliknięciu submit zaobserwujesz przesłane dane w formie jawnej w pliku steal-data.txt.</p>  
        </ul>
              
        
        <br>
        <br>            
            <div id="form-container">
                <p>Pobierz plik steal-data.php</p>
                <form id="downloadForm" method="POST">
                    <input type="submit" value="Pobierz">
                 </form>
            </div>
            <br>

            
<br><br>
<hr width="60%" align="center">
<br>
<h3>Jak skutecznie chronić aplikację przed atakiem RCE i problemami z integralnością?</h3>
<p>Sytuacja, w której programista użył nieznanej biblioteki, która zawierała funkcję eval i pobierała dane z formularza (takie jak adres e-mail i numer karty kredytowej), może prowadzić do ataku typu Remote Code Execution (RCE). Atakujący może wykorzystać eval do wykonania złośliwego kodu na serwerze, co stanowi poważne zagrożenie dla bezpieczeństwa.</p>

</p>
    <br>
    <li><strong>Weryfikacja zewnętrznych bibliotek:</strong> Zawsze dokładnie sprawdzaj źródło bibliotek, których używasz w projekcie. Używaj znanych, zaufanych źródeł oraz regularnie aktualizuj pakiety, aby uniknąć podatności.
    </li>
    <br>
    <li><strong>Kontrola dostępu i zarządzanie zależnościami:</strong> Używaj narzędzi do zarządzania zależnościami, aby monitorować i kontrolować wszystkie używane biblioteki.
    </li>
    <br>
    <li><strong>Testowanie i skanowanie bezpieczeństwa:</strong> Regularnie przeprowadzaj testy bezpieczeństwa swojej aplikacji, w tym skanowanie kodu pod kątem podatności oraz testy penetracyjne.
    </li>

    
<br>
<br>

            
            <div class="result"></div>        </section>
    </article>
</body>
</html>



