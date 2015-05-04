<?php

namespace SprykerFeature\Zed\Payone\Business\Mapper;


use Generated\Shared\Transfer\PayoneAuthorizationDataInterfaceTransfer;
use Generated\Shared\Transfer\PayoneCaptureDataInterfaceTransfer;
use Generated\Shared\Transfer\PayoneDebitDataInterfaceTransfer;
use Generated\Shared\Transfer\PayoneRefundDataInterfaceTransfer;
use Generated\Shared\Transfer\PayoneStandardParameterInterfaceTransfer;
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
     * @param StandardParameterInterface $standardParamter
     */
    public function setStandardParameter(StandardParameterInterface $standardParamter);

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
