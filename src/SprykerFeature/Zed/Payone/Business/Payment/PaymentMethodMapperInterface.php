<?php

namespace SprykerFeature\Zed\Payone\Business\Payment;


use SprykerFeature\Shared\Payone\Dependency\Transfer\AuthorizationDataInterface;
use SprykerFeature\Shared\Payone\Dependency\Transfer\CaptureDataInterface;
use SprykerFeature\Shared\Payone\Dependency\Transfer\DebitDataInterface;
use SprykerFeature\Shared\Payone\Dependency\Transfer\RefundDataInterface;
use SprykerFeature\Shared\Payone\Dependency\Transfer\StandardParameterInterface;
use SprykerFeature\Zed\Payone\Business\Api\Request\Container\AuthorizationContainer;
use SprykerFeature\Zed\Payone\Business\Api\Request\Container\DebitContainer;
use SprykerFeature\Zed\Payone\Business\Api\Request\Container\RefundContainer;
use SprykerFeature\Zed\Payone\Business\Api\Request\Container\CaptureContainer;
use SprykerFeature\Zed\Payone\Business\SequenceNumber\SequenceNumberProviderInterface;


interface PaymentMethodMapperInterface
{

    /**
     * @return string
     */
    public function getName();

    /**
     * @param SequenceNumberProviderInterface $sequenceNumberProvider
     */
    public function setSequenceNumberProvider(SequenceNumberProviderInterface $sequenceNumberProvider);

    /**
     * @param StandardParameterInterface $standardParameter
     */
    public function setStandardParameter(StandardParameterInterface $standardParameter);

    /**
     * @param AuthorizationDataInterface $authorizationData
     * @return AuthorizationContainer
     */
    public function mapAuthorization(AuthorizationDataInterface $authorizationData);

    /**
     * @param AuthorizationDataInterface $authorizationData
     * @return AuthorizationContainer
     */
    public function mapPreAuthorization(AuthorizationDataInterface $authorizationData);

    /**
     * @param CaptureDataInterface $captureData
     * @return CaptureContainer
     */
    public function mapCapture(CaptureDataInterface $captureData);

    /**
     * @param DebitDataInterface $debitData
     * @return DebitContainer
     */
    public function mapDebit(DebitDataInterface $debitData);

    /**
     * @param RefundDataInterface $refundData
     * @return RefundContainer
     */
    public function mapRefund(RefundDataInterface $refundData);

}
