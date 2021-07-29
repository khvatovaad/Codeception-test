<?php
// Задание: ждем нужный текст на странице

//Открыть страницу http://suninjuly.github.io/explicit_wait2.html
//Дождаться, когда цена дома уменьшится до $100 (ожидание нужно установить не меньше 12 секунд)
//Нажать на кнопку "Book"
//Решить уже известную нам математическую задачу (используйте ранее написанный код) и отправить решение

class WaitText248Cest
{
    public function _before(AcceptanceTester $I)
    {
    }

    private function func($x)
    {
        return log(abs(12 * sin((float)$x)));
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
        // ждем пока цена не упадет до 100$
        $I->amOnPage('/explicit_wait2.html');
        $I->waitForText('$100', 30, '#price');
        $I->click('#book');

        // расчет капчи
        $password = $I->grabTextFrom('#input_value');
        $answer = $this->func($password);
        $I->fillField("#answer", $answer);
        $I->click('#solve');
        $I->wait(3);
    }
}
