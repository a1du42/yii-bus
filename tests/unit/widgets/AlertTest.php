<?php

namespace tests\unit\widgets;

use app\widgets\Alert;
use Yii;

class AlertTest extends \Codeception\Test\Unit
{
    public function testSingleErrorMessage()
    {
        $message = 'This is an error messages';

        Yii::$app->session->setFlash('error', $message);

        $renderingResult = Alert::widget();

        verify($renderingResult)->stringContainsString($message);
        verify($renderingResult)->stringContainsString('alert-danger');

        verify($renderingResult)->stringNotContainsString('alert-success');
        verify($renderingResult)->stringNotContainsString('alert-info');
        verify($renderingResult)->stringNotContainsString('alert-warning');
    }

    public function testMultipleErrorMessages()
    {
        $firstMessage = 'This is the first error messages';
        $secondMessage = 'This is the second error messages';

        Yii::$app->session->setFlash('error', [$firstMessage, $secondMessage]);

        $renderingResult = Alert::widget();

        verify($renderingResult)->stringContainsString($firstMessage);
        verify($renderingResult)->stringContainsString($secondMessage);
        verify($renderingResult)->stringContainsString('alert-danger');

        verify($renderingResult)->stringNotContainsString('alert-success');
        verify($renderingResult)->stringNotContainsString('alert-info');
        verify($renderingResult)->stringNotContainsString('alert-warning');
    }

    public function testSingleDangerMessage()
    {
        $message = 'This is a danger messages';

        Yii::$app->session->setFlash('danger', $message);

        $renderingResult = Alert::widget();

        verify($renderingResult)->stringContainsString($message);
        verify($renderingResult)->stringContainsString('alert-danger');

        verify($renderingResult)->stringNotContainsString('alert-success');
        verify($renderingResult)->stringNotContainsString('alert-info');
        verify($renderingResult)->stringNotContainsString('alert-warning');
    }

    public function testMultipleDangerMessages()
    {
        $firstMessage = 'This is the first danger messages';
        $secondMessage = 'This is the second danger messages';

        Yii::$app->session->setFlash('danger', [$firstMessage, $secondMessage]);

        $renderingResult = Alert::widget();

        verify($renderingResult)->stringContainsString($firstMessage);
        verify($renderingResult)->stringContainsString($secondMessage);
        verify($renderingResult)->stringContainsString('alert-danger');

        verify($renderingResult)->stringNotContainsString('alert-success');
        verify($renderingResult)->stringNotContainsString('alert-info');
        verify($renderingResult)->stringNotContainsString('alert-warning');
    }

    public function testSingleSuccessMessage()
    {
        $message = 'This is a success messages';

        Yii::$app->session->setFlash('success', $message);

        $renderingResult = Alert::widget();

        verify($renderingResult)->stringContainsString($message);
        verify($renderingResult)->stringContainsString('alert-success');

        verify($renderingResult)->stringNotContainsString('alert-danger');
        verify($renderingResult)->stringNotContainsString('alert-info');
        verify($renderingResult)->stringNotContainsString('alert-warning');
    }

    public function testMultipleSuccessMessages()
    {
        $firstMessage = 'This is the first danger messages';
        $secondMessage = 'This is the second danger messages';

        Yii::$app->session->setFlash('success', [$firstMessage, $secondMessage]);

        $renderingResult = Alert::widget();

        verify($renderingResult)->stringContainsString($firstMessage);
        verify($renderingResult)->stringContainsString($secondMessage);
        verify($renderingResult)->stringContainsString('alert-success');

        verify($renderingResult)->stringNotContainsString('alert-danger');
        verify($renderingResult)->stringNotContainsString('alert-info');
        verify($renderingResult)->stringNotContainsString('alert-warning');
    }

    public function testSingleInfoMessage()
    {
        $message = 'This is an info messages';

        Yii::$app->session->setFlash('info', $message);

        $renderingResult = Alert::widget();

        verify($renderingResult)->stringContainsString($message);
        verify($renderingResult)->stringContainsString('alert-info');

        verify($renderingResult)->stringNotContainsString('alert-danger');
        verify($renderingResult)->stringNotContainsString('alert-success');
        verify($renderingResult)->stringNotContainsString('alert-warning');
    }

    public function testMultipleInfoMessages()
    {
        $firstMessage = 'This is the first info messages';
        $secondMessage = 'This is the second info messages';

        Yii::$app->session->setFlash('info', [$firstMessage, $secondMessage]);

        $renderingResult = Alert::widget();

        verify($renderingResult)->stringContainsString($firstMessage);
        verify($renderingResult)->stringContainsString($secondMessage);
        verify($renderingResult)->stringContainsString('alert-info');

        verify($renderingResult)->stringNotContainsString('alert-danger');
        verify($renderingResult)->stringNotContainsString('alert-success');
        verify($renderingResult)->stringNotContainsString('alert-warning');
    }

    public function testSingleWarningMessage()
    {
        $message = 'This is a warning messages';

        Yii::$app->session->setFlash('warning', $message);

        $renderingResult = Alert::widget();

        verify($renderingResult)->stringContainsString($message);
        verify($renderingResult)->stringContainsString('alert-warning');

        verify($renderingResult)->stringNotContainsString('alert-danger');
        verify($renderingResult)->stringNotContainsString('alert-success');
        verify($renderingResult)->stringNotContainsString('alert-info');
    }

    public function testMultipleWarningMessages()
    {
        $firstMessage = 'This is the first warning messages';
        $secondMessage = 'This is the second warning messages';

        Yii::$app->session->setFlash('warning', [$firstMessage, $secondMessage]);

        $renderingResult = Alert::widget();

        verify($renderingResult)->stringContainsString($firstMessage);
        verify($renderingResult)->stringContainsString($secondMessage);
        verify($renderingResult)->stringContainsString('alert-warning');

        verify($renderingResult)->stringNotContainsString('alert-danger');
        verify($renderingResult)->stringNotContainsString('alert-success');
        verify($renderingResult)->stringNotContainsString('alert-info');
    }

    public function testSingleMixedMessages() {
        $errorMessage = 'This is an error messages';
        $dangerMessage = 'This is a danger messages';
        $successMessage = 'This is a success messages';
        $infoMessage = 'This is a info messages';
        $warningMessage = 'This is a warning messages';

        Yii::$app->session->setFlash('error', $errorMessage);
        Yii::$app->session->setFlash('danger', $dangerMessage);
        Yii::$app->session->setFlash('success', $successMessage);
        Yii::$app->session->setFlash('info', $infoMessage);
        Yii::$app->session->setFlash('warning', $warningMessage);

        $renderingResult = Alert::widget();

        verify($renderingResult)->stringContainsString($errorMessage);
        verify($renderingResult)->stringContainsString($dangerMessage);
        verify($renderingResult)->stringContainsString($successMessage);
        verify($renderingResult)->stringContainsString($infoMessage);
        verify($renderingResult)->stringContainsString($warningMessage);

        verify($renderingResult)->stringContainsString('alert-danger');
        verify($renderingResult)->stringContainsString('alert-success');
        verify($renderingResult)->stringContainsString('alert-info');
        verify($renderingResult)->stringContainsString('alert-warning');
    }

    public function testMultipleMixedMessages() {
        $firstErrorMessage = 'This is the first error messages';
        $secondErrorMessage = 'This is the second error messages';
        $firstDangerMessage = 'This is the first danger messages';
        $secondDangerMessage = 'This is the second';
        $firstSuccessMessage = 'This is the first success messages';
        $secondSuccessMessage = 'This is the second success messages';
        $firstInfoMessage = 'This is the first info messages';
        $secondInfoMessage = 'This is the second info messages';
        $firstWarningMessage = 'This is the first warning messages';
        $secondWarningMessage = 'This is the second warning messages';

        Yii::$app->session->setFlash('error', [$firstErrorMessage, $secondErrorMessage]);
        Yii::$app->session->setFlash('danger', [$firstDangerMessage, $secondDangerMessage]);
        Yii::$app->session->setFlash('success', [$firstSuccessMessage, $secondSuccessMessage]);
        Yii::$app->session->setFlash('info', [$firstInfoMessage, $secondInfoMessage]);
        Yii::$app->session->setFlash('warning', [$firstWarningMessage, $secondWarningMessage]);

        $renderingResult = Alert::widget();

        verify($renderingResult)->stringContainsString($firstErrorMessage);
        verify($renderingResult)->stringContainsString($secondErrorMessage);
        verify($renderingResult)->stringContainsString($firstDangerMessage);
        verify($renderingResult)->stringContainsString($secondDangerMessage);
        verify($renderingResult)->stringContainsString($firstSuccessMessage);
        verify($renderingResult)->stringContainsString($secondSuccessMessage);
        verify($renderingResult)->stringContainsString($firstInfoMessage);
        verify($renderingResult)->stringContainsString($secondInfoMessage);
        verify($renderingResult)->stringContainsString($firstWarningMessage);
        verify($renderingResult)->stringContainsString($secondWarningMessage);

        verify($renderingResult)->stringContainsString('alert-danger');
        verify($renderingResult)->stringContainsString('alert-success');
        verify($renderingResult)->stringContainsString('alert-info');
        verify($renderingResult)->stringContainsString('alert-warning');
    }

    public function testFlashIntegrity()
    {
        $errorMessage = 'This is an error messages';
        $unrelatedMessage = 'This is a messages that is not related to the alert widget';

        Yii::$app->session->setFlash('error', $errorMessage);
        Yii::$app->session->setFlash('unrelated', $unrelatedMessage);

        Alert::widget();

        // Simulate redirect
        Yii::$app->session->close();
        Yii::$app->session->open();

        verify(Yii::$app->session->getFlash('error'))->empty();
        verify(Yii::$app->session->getFlash('unrelated'))->equals($unrelatedMessage);
    }
}
