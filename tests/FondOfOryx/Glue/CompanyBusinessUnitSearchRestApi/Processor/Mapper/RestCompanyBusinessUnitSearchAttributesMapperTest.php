<?php

namespace FondOfOryx\Glue\CompanyBusinessUnitSearchRestApi\Processor\Mapper;

use ArrayObject;
use Codeception\Test\Unit;
use Generated\Shared\Transfer\CompanyBusinessUnitListTransfer;
use Generated\Shared\Transfer\RestCompanyBusinessUnitSearchPaginationTransfer;
use Generated\Shared\Transfer\RestCompanyBusinessUnitSearchResultItemTransfer;
use Generated\Shared\Transfer\RestCompanyBusinessUnitSearchSortTransfer;

class RestCompanyBusinessUnitSearchAttributesMapperTest extends Unit
{
    /**
     * @var \FondOfOryx\Glue\CompanyBusinessUnitSearchRestApi\Processor\Mapper\RestCompanyBusinessUnitSearchResultItemMapperInterface|\PHPUnit\Framework\MockObject\MockObject|mixed
     */
    protected $restCompanyBusinessUnitSearchResultItemMapperMock;

    /**
     * @var \FondOfOryx\Glue\CompanyBusinessUnitSearchRestApi\Processor\Mapper\RestCompanyBusinessUnitSearchSortMapperInterface|\PHPUnit\Framework\MockObject\MockObject|mixed
     */
    protected $restCompanyBusinessUnitSearchSortMapperMock;

    /**
     * @var \FondOfOryx\Glue\CompanyBusinessUnitSearchRestApi\Processor\Mapper\RestCompanyBusinessUnitSearchPaginationMapperInterface|\PHPUnit\Framework\MockObject\MockObject|mixed
     */
    protected $restCompanyBusinessUnitSearchPaginationMapperMock;

    /**
     * @var \Generated\Shared\Transfer\CompanyBusinessUnitListTransfer|\PHPUnit\Framework\MockObject\MockObject|mixed
     */
    protected $companyBusinessUnitListTransferMock;

    /**
     * @var array
     */
    protected $restCompanyBusinessUnitSearchResultItemTransferMocks;

    /**
     * @var \Generated\Shared\Transfer\RestCompanyBusinessUnitSearchSortTransfer|\PHPUnit\Framework\MockObject\MockObject|mixed
     */
    protected $restCompanyBusinessUnitSearchSortTransferMock;

    /**
     * @var \Generated\Shared\Transfer\RestCompanyBusinessUnitSearchPaginationTransfer|\PHPUnit\Framework\MockObject\MockObject|mixed
     */
    protected $restCompanyBusinessUnitSearchPaginationTransferMock;

    /**
     * @var \FondOfOryx\Glue\CompanyBusinessUnitSearchRestApi\Processor\Mapper\RestCompanyBusinessUnitSearchAttributesMapper
     */
    protected $restCompanyBusinessUnitSearchAttributesMapper;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->restCompanyBusinessUnitSearchResultItemMapperMock = $this->getMockBuilder(RestCompanyBusinessUnitSearchResultItemMapperInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->restCompanyBusinessUnitSearchSortMapperMock = $this->getMockBuilder(RestCompanyBusinessUnitSearchSortMapperInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->restCompanyBusinessUnitSearchPaginationMapperMock = $this->getMockBuilder(RestCompanyBusinessUnitSearchPaginationMapperInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyBusinessUnitListTransferMock = $this->getMockBuilder(CompanyBusinessUnitListTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->restCompanyBusinessUnitSearchResultItemTransferMocks = [
            $this->getMockBuilder(RestCompanyBusinessUnitSearchResultItemTransfer::class)
                ->disableOriginalConstructor()
                ->getMock(),
        ];

        $this->restCompanyBusinessUnitSearchSortTransferMock = $this->getMockBuilder(RestCompanyBusinessUnitSearchSortTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->restCompanyBusinessUnitSearchPaginationTransferMock = $this->getMockBuilder(RestCompanyBusinessUnitSearchPaginationTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->restCompanyBusinessUnitSearchAttributesMapper = new RestCompanyBusinessUnitSearchAttributesMapper(
            $this->restCompanyBusinessUnitSearchResultItemMapperMock,
            $this->restCompanyBusinessUnitSearchSortMapperMock,
            $this->restCompanyBusinessUnitSearchPaginationMapperMock,
        );
    }

    /**
     * @return void
     */
    public function testFromCompanyList(): void
    {
        $companies = new ArrayObject($this->restCompanyBusinessUnitSearchResultItemTransferMocks);

        $this->restCompanyBusinessUnitSearchResultItemMapperMock->expects(static::atLeastOnce())
            ->method('fromCompanyBusinessUnitList')
            ->with($this->companyBusinessUnitListTransferMock)
            ->willReturn($companies);

        $this->restCompanyBusinessUnitSearchSortMapperMock->expects(static::atLeastOnce())
            ->method('fromCompanyBusinessUnitList')
            ->with($this->companyBusinessUnitListTransferMock)
            ->willReturn($this->restCompanyBusinessUnitSearchSortTransferMock);

        $this->restCompanyBusinessUnitSearchPaginationMapperMock->expects(static::atLeastOnce())
            ->method('fromCompanyBusinessUnitList')
            ->with($this->companyBusinessUnitListTransferMock)
            ->willReturn($this->restCompanyBusinessUnitSearchPaginationTransferMock);

        $restCompanyBusinessUnitSearchAttributesTransfer = $this->restCompanyBusinessUnitSearchAttributesMapper->fromCompanyBusinessUnitList(
            $this->companyBusinessUnitListTransferMock,
        );

        static::assertEquals(
            $companies,
            $restCompanyBusinessUnitSearchAttributesTransfer->getCompanyBusinessUnits(),
        );

        static::assertEquals(
            $this->restCompanyBusinessUnitSearchSortTransferMock,
            $restCompanyBusinessUnitSearchAttributesTransfer->getSort(),
        );

        static::assertEquals(
            $this->restCompanyBusinessUnitSearchPaginationTransferMock,
            $restCompanyBusinessUnitSearchAttributesTransfer->getPagination(),
        );
    }
}
