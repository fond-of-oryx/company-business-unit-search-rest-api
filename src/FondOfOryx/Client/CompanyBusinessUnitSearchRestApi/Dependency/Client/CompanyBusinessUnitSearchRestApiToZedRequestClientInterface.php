<?php

namespace FondOfOryx\Client\CompanyBusinessUnitSearchRestApi\Dependency\Client;

use Spryker\Shared\Kernel\Transfer\TransferInterface;

interface CompanyBusinessUnitSearchRestApiToZedRequestClientInterface
{
    /**
     * @param string $url
     * @param \Spryker\Shared\Kernel\Transfer\TransferInterface $object
     * @param array|null $requestOptions
     *
     * @return \Spryker\Shared\Kernel\Transfer\TransferInterface
     */
    public function call(string $url, TransferInterface $object, ?array $requestOptions = null): TransferInterface;
}
