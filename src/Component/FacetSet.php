<?php

namespace Solarium\Component;

use Solarium\Component\Facet\FacetInterface;
use Solarium\Component\RequestBuilder\FacetSet as RequestBuilder;
use Solarium\Component\ResponseParser\FacetSet as ResponseParser;

/**
 * FacetSet component.
 */
class FacetSet extends AbstractComponent implements FacetSetInterface
{
    use FacetSetTrait;

    /**
     * Facet type mapping.
     *
     * @var array
     */
    protected $facetTypes = [
        FacetSetInterface::FACET_FIELD => 'Solarium\Component\Facet\Field',
        FacetSetInterface::FACET_QUERY => 'Solarium\Component\Facet\Query',
        FacetSetInterface::FACET_MULTIQUERY => 'Solarium\Component\Facet\MultiQuery',
        FacetSetInterface::FACET_RANGE => 'Solarium\Component\Facet\Range',
        FacetSetInterface::FACET_PIVOT => 'Solarium\Component\Facet\Pivot',
        FacetSetInterface::FACET_INTERVAL => 'Solarium\Component\Facet\Interval',
        FacetSetInterface::JSON_FACET_AGGREGATION => 'Solarium\Component\Facet\JsonAggregation',
        FacetSetInterface::JSON_FACET_TERMS => 'Solarium\Component\Facet\JsonTerms',
        FacetSetInterface::JSON_FACET_QUERY => 'Solarium\Component\Facet\JsonQuery',
        FacetSetInterface::JSON_FACET_RANGE => 'Solarium\Component\Facet\JsonRange',
    ];

    /**
     * Facets.
     *
     * @var FacetInterface[]
     */
    protected $facets = [];

    /**
     * Get component type.
     *
     * @return string
     */
    public function getType(): string
    {
        return ComponentAwareQueryInterface::COMPONENT_FACETSET;
    }

    /**
     * Get a requestbuilder for this query.
     *
     * @return RequestBuilder
     */
    public function getRequestBuilder(): RequestBuilder
    {
        return new RequestBuilder();
    }

    /**
     * Get a response parser for this query.
     *
     * @return ResponseParser
     */
    public function getResponseParser(): ResponseParser
    {
        return new ResponseParser();
    }

    /**
     * Allow extraction of facets without having to define
     * them on the query.
     *
     * @param bool $extract
     *
     * @return self Provides fluent interface
     */
    public function setExtractFromResponse(bool $extract): self
    {
        $this->setOption('extractfromresponse', $extract);
        return $this;
    }

    /**
     * Get the extractfromresponse option value.
     *
     * @return bool|null
     */
    public function getExtractFromResponse(): ?bool
    {
        return $this->getOption('extractfromresponse');
    }

    /**
     * Limit the terms for faceting by a prefix.
     *
     * This is a global value for all facets in this facetset
     *
     * @param string $prefix
     *
     * @return self Provides fluent interface
     */
    public function setPrefix(string $prefix): self
    {
        $this->setOption('prefix', $prefix);
        return $this;
    }

    /**
     * Get the facet prefix.
     *
     * This is a global value for all facets in this facetset
     *
     * @return string|null
     */
    public function getPrefix(): ?string
    {
        return $this->getOption('prefix');
    }

    /**
     * Limit the terms for faceting by a string they must contain. Since Solr 5.1.
     *
     * This is a global value for all facets in this facetset
     *
     * @param string $contains
     *
     * @return self Provides fluent interface
     */
    public function setContains(string $contains): self
    {
        $this->setOption('contains', $contains);
        return $this;
    }

    /**
     * Get the facet contains.
     *
     * This is a global value for all facets in this facetset
     *
     * @return string|null
     */
    public function getContains(): ?string
    {
        return $this->getOption('contains');
    }

    /**
     * Case sensitivity of matching string that facet terms must contain. Since Solr 5.1.
     *
     * This is a global value for all facets in this facetset
     *
     * @param bool $containsIgnoreCase
     *
     * @return self Provides fluent interface
     */
    public function setContainsIgnoreCase(bool $containsIgnoreCase): self
    {
        $this->setOption('containsignorecase', $containsIgnoreCase);
        return $this;
    }

    /**
     * Get the case sensitivity of facet contains.
     *
     * This is a global value for all facets in this facetset
     *
     * @return bool|null
     */
    public function getContainsIgnoreCase(): ?bool
    {
        return $this->getOption('containsignorecase');
    }

    /**
     * Set the facet sort order.
     *
     * Use one of the SORT_* constants as the value
     *
     * This is a global value for all facets in this facetset
     *
     * @param string $sort
     *
     * @return self Provides fluent interface
     */
    public function setSort(string $sort): self
    {
        $this->setOption('sort', $sort);
        return $this;
    }

    /**
     * Get the facet sort order.
     *
     * This is a global value for all facets in this facetset
     *
     * @return string|null
     */
    public function getSort(): ?string
    {
        return $this->getOption('sort');
    }

    /**
     * Set the facet limit.
     *
     *  This is a global value for all facets in this facetset
     *
     * @param int $limit
     *
     * @return self Provides fluent interface
     */
    public function setLimit(int $limit): self
    {
        $this->setOption('limit', $limit);
        return $this;
    }

    /**
     * Get the facet limit.
     *
     * This is a global value for all facets in this facetset
     *
     * @return int|null
     */
    public function getLimit(): ?int
    {
        return $this->getOption('limit');
    }

    /**
     * Set the facet mincount.
     *
     * This is a global value for all facets in this facetset
     *
     * @param int $minCount
     *
     * @return self Provides fluent interface
     */
    public function setMinCount(int $minCount): self
    {
        $this->setOption('mincount', $minCount);
        return $this;
    }

    /**
     * Get the facet mincount.
     *
     * This is a global value for all facets in this facetset
     *
     * @return int|null
     */
    public function getMinCount(): ?int
    {
        return $this->getOption('mincount');
    }

    /**
     * Set the missing count option.
     *
     * This is a global value for all facets in this facetset
     *
     * @param bool $missing
     *
     * @return self Provides fluent interface
     */
    public function setMissing(bool $missing): self
    {
        $this->setOption('missing', $missing);
        return $this;
    }

    /**
     * Get the facet missing option.
     *
     * This is a global value for all facets in this facetset
     *
     * @return bool|null
     */
    public function getMissing(): ?bool
    {
        return $this->getOption('missing');
    }

    /**
     * Get a facet field instance.
     *
     * @param mixed $options
     * @param bool  $add
     *
     * @return \Solarium\Component\Facet\Field|FacetInterface
     */
    public function createFacetField($options = null, bool $add = true): FacetInterface
    {
        return $this->createFacet(FacetSetInterface::FACET_FIELD, $options, $add);
    }

    /**
     * Get a facet query instance.
     *
     * @param mixed $options
     * @param bool  $add
     *
     * @return \Solarium\Component\Facet\Query|FacetInterface
     */
    public function createFacetQuery($options = null, bool $add = true): FacetInterface
    {
        return $this->createFacet(FacetSetInterface::FACET_QUERY, $options, $add);
    }

    /**
     * Get a facet multiquery instance.
     *
     * @param mixed $options
     * @param bool  $add
     *
     * @return \Solarium\Component\Facet\MultiQuery|FacetInterface
     */
    public function createFacetMultiQuery($options = null, bool $add = true): FacetInterface
    {
        return $this->createFacet(FacetSetInterface::FACET_MULTIQUERY, $options, $add);
    }

    /**
     * Get a facet range instance.
     *
     * @param mixed $options
     * @param bool  $add
     *
     * @return \Solarium\Component\Facet\Range|FacetInterface
     */
    public function createFacetRange($options = null, bool $add = true): FacetInterface
    {
        return $this->createFacet(FacetSetInterface::FACET_RANGE, $options, $add);
    }

    /**
     * Get a facet pivot instance.
     *
     * @param mixed $options
     * @param bool  $add
     *
     * @return \Solarium\Component\Facet\Pivot|FacetInterface
     */
    public function createFacetPivot($options = null, bool $add = true): FacetInterface
    {
        return $this->createFacet(FacetSetInterface::FACET_PIVOT, $options, $add);
    }

    /**
     * Get a facet interval instance.
     *
     * @param mixed $options
     * @param bool  $add
     *
     * @return \Solarium\Component\Facet\Interval|FacetInterface
     */
    public function createFacetInterval($options = null, bool $add = true): FacetInterface
    {
        return $this->createFacet(FacetSetInterface::FACET_INTERVAL, $options, $add);
    }

    /**
     * Get a json facet aggregation instance.
     *
     * @param mixed $options
     * @param bool  $add
     *
     * @return \Solarium\Component\Facet\JsonAggregation|FacetInterface
     */
    public function createJsonFacetAggregation($options = null, bool $add = true): FacetInterface
    {
        return $this->createFacet(FacetSetInterface::JSON_FACET_AGGREGATION, $options, $add);
    }

    /**
     * Get a json facet terms instance.
     *
     * @param mixed $options
     * @param bool  $add
     *
     * @return \Solarium\Component\Facet\JsonTerms|FacetInterface
     */
    public function createJsonFacetTerms($options = null, bool $add = true): FacetInterface
    {
        return $this->createFacet(FacetSetInterface::JSON_FACET_TERMS, $options, $add);
    }

    /**
     * Get a json facet query instance.
     *
     * @param mixed $options
     * @param bool  $add
     *
     * @return \Solarium\Component\Facet\JsonQuery|FacetInterface
     */
    public function createJsonFacetQuery($options = null, bool $add = true): FacetInterface
    {
        return $this->createFacet(FacetSetInterface::JSON_FACET_QUERY, $options, $add);
    }

    /**
     * Get a json facet range instance.
     *
     * @param mixed $options
     * @param bool  $add
     *
     * @return \Solarium\Component\Facet\JsonRange|FacetInterface
     */
    public function createJsonFacetRange($options = null, bool $add = true): FacetInterface
    {
        return $this->createFacet(FacetSetInterface::JSON_FACET_RANGE, $options, $add);
    }
}
