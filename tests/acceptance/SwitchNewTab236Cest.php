<?php

//Задание: переход на новую вкладку

//Открыть страницу http://suninjuly.github.io/redirect_accept.html
//Нажать на кнопку
//Переключиться на новую вкладку
//Пройти капчу для робота и получить число-ответ


class SwitchNewTab236Cest
{
    public function _before(AcceptanceTester $I)
    {
    }

    private function func($x)
    {
        return log(abs(12 * sin((float)$x)));
    }

    // tests
    // доработка предыдущего теста для переключения вкладки

    public function tryToTest(AcceptanceTester $I)
    {
        $I->amOnPage('/redirect_accept.html');
        $I->click(['class' => 'trollface']);
        $I->switchToNextTab();
        $I->see('Math is real magic!');
        $password = $I->grabTextFrom('#input_value');
        $answer = $this->func($password);
        $I->fillField("#answer", $answer);
        $I->click(['class' => 'btn']);
        $I->wait(3);

    }
}
