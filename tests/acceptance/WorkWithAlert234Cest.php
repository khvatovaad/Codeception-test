<?php
//Задание 2.3.4
//Открыть страницу http://suninjuly.github.io/alert_accept.html
//Нажать на кнопку
//Принять confirm
//На новой странице решить капчу для роботов, чтобы получить число с ответом

class WorkWithAlert234Cest
{

    public function _before(AcceptanceTester $I)
    {
    }

    // функция для расчета капчи
    private function func($x)
    {
        return log(abs(12 * sin((float)$x)));
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {

        $I->amOnPage('/alert_accept.html');                        #Заходим на страничку
        $I->wait(3);                                             #Ждем 3 секунды, чтобы страница прогрузилась
        $I->click(['class' => 'btn']);                                  #Клик по кнопке
        $I->acceptPopup();                                              #Клик по алерту
        $password = $I->grabTextFrom('#input_value');    #Получаем значение х
        $answer = $this->func($password);                               #Расчет функции
        $I->fillField("#answer", $answer);                         #Подстановка расчитанного значения в поле
        $I->click(['class' => 'btn']);                                  #Клик по кнопке
        $I->wait(3);
    }
}
