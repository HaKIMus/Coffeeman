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
      | trainingId | userId | trainingType | burnedCalories | workoutTime |
      | 1  | 1      | CARDIO       | 300            | 21:12:15    |
      | 2  | 1      | CARDIO       | 460            | 15:16:35    |
      | 3  | 3      | HIIT         | 345            | 06:45:34    |
      | 4  | 4      | ABS          | 671            | 21:52:59    |

  Scenariusz: Pobieranie wybranego treningu
    Mając w repozytorium treningi
    Wtedy chcialbym pobrac trening "1"
    Oraz chcialbym pobrac trening "2"
    Oraz chcialbym pobrac trening "3"

  Scenariusz: Usuwanie wybranego treningu
    Mając w repozytorium treningi
    Wtedy chcialbym usunac trening "3"
    Oraz chcialbym aby nie bylo mozliwe pobranie samochodu "3"

  Scenariusz: Modyfikowanie wybranego treningu
    Mając w repozytorium treningi
    Wtedy chcialbym zmienic ilosc spalonych kalorii na "<burnedCalories>" w treningu "<id>"
    Oraz w treningu "<id>" chcialbym zmienic typ treningu na "<trainingType>"
    Oraz nie chciałbym aby możliwym było dodanie spalonych kalorii powyżej 2000