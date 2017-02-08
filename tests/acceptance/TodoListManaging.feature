#language: pl

Potrzeba biznesowa: Zarządzanie tablicą treningów
  W celu zarządzania tablicą treningów,
  Jako użytkownik
  Chcę:
  + dodać nowy trening
  + usunąć wybrany trening
  + pobrać wszystkie istniejące zapisane treningi
  + zmodyfikować wybrany trening
  + dodać typ treningu
  + dodać do treningu odsyłacz do wykonywanych zadań
  + dodać spalone kalorie
  + dodać czas treningu

  Założenia:
    Kiedy mam nastepujace dane o treningach, chce je dodac do repozytorium:
      | id | userId | trainingType | burnedCalories | startTraining       | endTraining         |
      | 1  | 1      | CARDIO       | 300            | 2017-02-06 21:12:15 | 2017-02-06 22:32:15 |
      | 2  | 1      | CARDIO       | 460            | 2017-02-06 15:16:35 | 2017-02-06 02:12:15 |
      | 3  | 3      | HIIT         | 345            | 2017-02-06 06:45:34 | 2017-02-06 21:42:15 |
      | 4  | 4      | ABS          | 671            | 2017-02-06 21:52:59 | 2017-02-06 01:12:15 |

  Scenariusz: Pobieranie wybranego treningu
    Mając w repozytorium treningi
    Wtedy chcialbym pobrac trening "1"
    Oraz chcialbym pobrac trening "2"
    Oraz chcialbym pobrac trening "3"

  Scenariusz: Usuwanie wybranego treningu
    Mając w repozytorium treningi
    Wtedy chcialbym usunac trening "3"
    Oraz chcialbym aby nie bylo mozliwe pobranie samochodu "3"

  Szablon scenariusza: Modyfikowanie wybranego treningu
    Mając w repozytorium treningi
    Wtedy chcialbym zmienic ilosc spalonych kalorii na "<burnedCalories>" w treningu "<id>"
    Oraz w treningu "<id>" chcialbym zmienic typ treningu na "<trainingType>"

    Przykłady:
      | id | burnedCalories | trainingType |
      | 1  | 450            | ABS          |
      | 2  | 320            | CARDIO       |
      | 3  | 486            | HIIT         |