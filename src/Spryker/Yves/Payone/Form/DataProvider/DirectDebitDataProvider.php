<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Yves\Payone\Form\DataProvider;

use Generated\Shared\Transfer\PaymentTransfer;
use Generated\Shared\Transfer\PayonePaymentTransfer;
use Spryker\Shared\Kernel\Store;
use Spryker\Shared\Transfer\AbstractTransfer;
use Spryker\Yves\Payone\Form\DirectDebitSubForm;
use Spryker\Yves\StepEngine\Dependency\Form\StepEngineFormDataProviderInterface;

class DirectDebitDataProvider implements StepEngineFormDataProviderInterface
{

    /**
     * @param \Spryker\Shared\Transfer\AbstractTransfer|\Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \Spryker\Shared\Transfer\AbstractTransfer
     */
    public function getData(AbstractTransfer $quoteTransfer)
    {
        if ($quoteTransfer->getPayment() === null) {
            $paymentTransfer = new PaymentTransfer();
            $paymentTransfer->setPayone(new PayonePaymentTransfer());
            $quoteTransfer->setPayment($paymentTransfer);
        }
        return $quoteTransfer;
    }

    /**
     * @param \Spryker\Shared\Transfer\AbstractTransfer $quoteTransfer
     *
     * @return array
     */
    public function getOptions(AbstractTransfer $quoteTransfer)
    {
        return [
            DirectDebitSubForm::OPTION_BANK_COUNTRIES => $this->getBankCountries(),
            DirectDebitSubForm::OPTION_BANK_ACCOUNT_MODE => $this->getBankAccountModes(),
        ];
    }

    /**
     * @return array
     */
    protected function getBankCountries()
    {
        return [
            Store::getInstance()->getCurrentCountry() => Store::getInstance()->getCurrentCountry(),
        ];
    }

    /**
     * @return array
     */
    protected function getBankAccountModes()
    {
        return [
            'BBAN' => 'BBAN',
            'IBAN/BIC' => 'IBAN/BIC',
        ];
    }

}
