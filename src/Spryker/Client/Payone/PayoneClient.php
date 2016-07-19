<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Client\Payone;

use Generated\Shared\Transfer\PayoneManageMandateTransfer;
use Generated\Shared\Transfer\PayonePaymentDirectDebitTransfer;
use Generated\Shared\Transfer\PayonePersonalDataTransfer;
use Generated\Shared\Transfer\PayoneTransactionStatusUpdateTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Spryker\Client\Kernel\AbstractClient;

/**
 * @api
 *
 * @method \Spryker\Client\Payone\PayoneFactory getFactory()
 */
class PayoneClient extends AbstractClient implements PayoneClientInterface
{

    /**
     * @api
     *
     * @return \Spryker\Client\Payone\ClientApi\Request\CreditCardCheck
     */
    public function getCreditCardCheckRequest()
    {
        $defaults = [];
        return $this->getFactory()->createCreditCardCheckCall($defaults)->mapCreditCardCheckData();
    }

    /**
     * @api
     *
     * @param \Generated\Shared\Transfer\PayoneTransactionStatusUpdateTransfer $statusUpdateTransfer
     *
     * @return \Generated\Shared\Transfer\PayoneTransactionStatusUpdateTransfer
     */
    public function updateStatus(PayoneTransactionStatusUpdateTransfer $statusUpdateTransfer)
    {
        return $this->getFactory()->createZedStub()->updateStatus($statusUpdateTransfer);
    }

    /**
     * @api
     *
     * @param \Generated\Shared\Transfer\PayonePaymentDirectDebitTransfer $directDebitTransfer
     *
     * @return \Generated\Shared\Transfer\PayoneBankAccountCheckTransfer
     */
    public function bankAccountCheck(PayonePaymentDirectDebitTransfer $directDebitTransfer)
    {
        $response = $this->getFactory()->createZedStub()->bankAccountCheck($directDebitTransfer);
        return $response;
    }

    /**
     * @api
     *
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \Generated\Shared\Transfer\PayoneManageMandateTransfer
     */
    public function manageMandate(QuoteTransfer $quoteTransfer)
    {
        $manageMandateTransfer = new PayoneManageMandateTransfer();
        $manageMandateTransfer->setIban($quoteTransfer->getPayment()->getPayoneDirectDebit()->getIban());
        $manageMandateTransfer->setBic($quoteTransfer->getPayment()->getPayoneDirectDebit()->getBic());
        $personalData = new PayonePersonalDataTransfer();
        $customer = $quoteTransfer->getCustomer();
        $personalData->setCustomerId($customer->getIdCustomer());
        $personalData->setLastName($customer->getLastName());
        $personalData->setFirstName($customer->getFirstName());
        $personalData->setCompany($customer->getCompany());
        $personalData->setCountry($quoteTransfer->getBillingAddress()->getIso2Code());
        $personalData->setCity($quoteTransfer->getBillingAddress()->getCity());
        $manageMandateTransfer->setPersonalData($personalData);

        return $this->getFactory()->createZedStub()->manageMandate($manageMandateTransfer);
    }

}