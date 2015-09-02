<?php
/**
 * @copyright  Copyright (c) 2015 Souq.com. All rights reserved.
 * @author     Ahmed El.Hussaini(ahussaini@souq.com)
 * @package    SouqAPI
 * @version    1.1
 */

namespace SouqAPI\Entity;

/**
 * Represents a product on Souq.com
 */
class Product extends Entity
{
    /**
     * Id of the product
     * @var integer
     */
    private $id;

    /**
     * Product type id
     * @var integer
     */
    private $productTypeId;

    /**
     * Product type label plural
     * @var string
     */
    private $productTypeLabelPlural;

    /**
     * Perma link to the product
     * @var string
     */
    private $link;

    /**
     * Relative links to the product based on locale.
     * Currently only en|ar are supported.
     * @var array
     */
    private $links;

    /**
     * Label/Title of the product
     * @var string
     */
    private $label;

    /**
     * Description of the product
     * @var string
     */
    private $snippetOfDescription;

    /**
     * List of available images for the product grouped by the following sizes:
     * XS - S - M - L - XL
     * @var array
     */
    private $images;

    /**
     * Currency label of the product's price
     * ex: AED
     * @var string
     */
    private $currency;

    /**
     * MSRP code of the product
     * @var integer
     */
    private $msrp;

    /**
     * Cuurent offer id of the product
     * @var integer
     */
    private $offerId;

    /**
     * Current offer price
     * @var integer
     */
    private $offerPrice;

    /**
     * List of available EANs
     * @var array
     */
    private $ean;

    /**
     * Number of ratings available
     * @var string
     */
    private $ratingsCount;

    /**
     * List of videos available if any.
     * sample video:
     * <code>
     * <?php
     * {
     *     "thumbnail": "http://img.youtube.com/vi/wGCetsl-srk/0.jpg",
     *     "provider": "youtube",
     *     "source": "//www.youtube.com/embed/wGCetsl-srk"
     * }
     * </code>
     * @var array
     */
    private $video;

    /**
     * List of available attributes.
     * An attribute is key/value the describes the product main information
     * example:
     * <code>
     * <?php
     * {
     *     "label": "Brand",
     *     "value": "Apple"
     * }
     * </code>
     * @var array
     */
    private $attributes;


    /**
     * List of available attributes' groups.
     * An attribute group is key/value the describes the product specifics
     * example:
     * <code>
     * <?php
     * {
     *     "name": "lens_system",
     *     "label": "Lens System",
     *     "attributes": [{
     *         "label": "Zoom capability",
     *         "value": "4"
     *     }]
     * }
     * </code>
     * @var array
     */
    private $attributesGroups;

    /**
     * List of available variations
     * @var array
     */
    private $variations;

    /**
     * Gets the Id of the product.
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the Id of the product.
     *
     * @param integer $id the id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets the Product type id.
     *
     * @return integer
     */
    public function getProductTypeId()
    {
        return $this->productTypeId;
    }

    /**
     * Sets the Product type id.
     *
     * @param integer $productTypeId the product type id
     *
     * @return self
     */
    public function setProductTypeId($productTypeId)
    {
        $this->productTypeId = $productTypeId;

        return $this;
    }

    /**
     * Gets the Product type label plural.
     *
     * @return string
     */
    public function getProductTypeLabelPlural()
    {
        return $this->productTypeLabelPlural;
    }

    /**
     * Sets the Product type label plural.
     *
     * @param string $productTypeLabelPlural the product type label plural
     *
     * @return self
     */
    public function setProductTypeLabelPlural($productTypeLabelPlural)
    {
        $this->productTypeLabelPlural = $productTypeLabelPlural;

        return $this;
    }

    /**
     * Gets the Perma link to the product.
     *
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Sets the Perma link to the product.
     *
     * @param string $link the link
     *
     * @return self
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Gets the Relative links to the product based on locale
Currently only en|ar are supported.
     *
     * @return array
     */
    public function getLinks()
    {
        return $this->links;
    }

    /**
     * Sets the Relative links to the product based on locale
Currently only en|ar are supported.
     *
     * @param array $links the links
     *
     * @return self
     */
    public function setLinks(array $links)
    {
        $this->links = $links;

        return $this;
    }

    /**
     * Gets the Label/Title of the product.
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Sets the Label/Title of the product.
     *
     * @param string $label the label
     *
     * @return self
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Gets the Description of the product.
     *
     * @return string
     */
    public function getSnippetOfDescription()
    {
        return $this->snippetOfDescription;
    }

    /**
     * Sets the Description of the product.
     *
     * @param string $snippetOfDescription the snippet of description
     *
     * @return self
     */
    public function setSnippetOfDescription($snippetOfDescription)
    {
        $this->snippetOfDescription = $snippetOfDescription;

        return $this;
    }

    /**
     * Gets the List of available images for the product grouped by the following sizes:
XS - S - M - L - XL.
     *
     * @return array
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * Sets the List of available images for the product grouped by the following sizes:
XS - S - M - L - XL.
     *
     * @param array $images the images
     *
     * @return self
     */
    public function setImages(array $images)
    {
        $this->images = $images;

        return $this;
    }

    /**
     * Gets the Currency label of the product's price
ex: AED.
     *
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Sets the Currency label of the product's price
ex: AED.
     *
     * @param string $currency the currency
     *
     * @return self
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * Gets the MSRP code of the product.
     *
     * @return integer
     */
    public function getMsrp()
    {
        return $this->msrp;
    }

    /**
     * Sets the MSRP code of the product.
     *
     * @param integer $msrp the msrp
     *
     * @return self
     */
    public function setMsrp($msrp)
    {
        $this->msrp = $msrp;

        return $this;
    }

    /**
     * Gets the Cuurent offer id of the product.
     *
     * @return integer
     */
    public function getOfferId()
    {
        return $this->offerId;
    }

    /**
     * Sets the Cuurent offer id of the product.
     *
     * @param integer $offerId the offer id
     *
     * @return self
     */
    public function setOfferId($offerId)
    {
        $this->offerId = $offerId;

        return $this;
    }

    /**
     * Gets the Current offer price.
     *
     * @return integer
     */
    public function getOfferPrice()
    {
        return $this->offerPrice;
    }

    /**
     * Sets the Current offer price.
     *
     * @param integer $offerPrice the offer price
     *
     * @return self
     */
    public function setOfferPrice($offerPrice)
    {
        $this->offerPrice = $offerPrice;

        return $this;
    }

    /**
     * Gets the List of available EANs.
     *
     * @return array
     */
    public function getEan()
    {
        return $this->ean;
    }

    /**
     * Sets the List of available EANs.
     *
     * @param array $ean the ean
     *
     * @return self
     */
    public function setEan(array $ean)
    {
        $this->ean = $ean;

        return $this;
    }

    /**
     * Gets the Number of ratings available.
     *
     * @return string
     */
    public function getRatingsCount()
    {
        return $this->ratingsCount;
    }

    /**
     * Sets the Number of ratings available.
     *
     * @param string $ratingsCount the ratings count
     *
     * @return self
     */
    public function setRatingsCount($ratingsCount)
    {
        $this->ratingsCount = $ratingsCount;

        return $this;
    }

    /**
     * Gets the List of videos available if any
sample video:
<code>
<?php
{
"thumbnail": "http://img.youtube.com/vi/wGCetsl-srk/0.jpg",
"provider": "youtube",
"source": "//www.youtube.com/embed/wGCetsl-srk"
}
</code>.
     *
     * @return array
     */
    public function getVideo()
    {
        return $this->video;
    }

    /**
     * Sets the List of videos available if any
sample video:
<code>
<?php
{
"thumbnail": "http://img.youtube.com/vi/wGCetsl-srk/0.jpg",
"provider": "youtube",
"source": "//www.youtube.com/embed/wGCetsl-srk"
}
</code>.
     *
     * @param array $video the video
     *
     * @return self
     */
    public function setVideo(array $video)
    {
        $this->video = $video;

        return $this;
    }

    /**
     * Gets the List of available attributes
An attribute is key/value the describes the product main information
example:
<code>
<?php
{
"label": "Brand",
"value": "Apple"
}
</code>.
     *
     * @return array
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * Sets the List of available attributes
An attribute is key/value the describes the product main information
example:
<code>
<?php
{
"label": "Brand",
"value": "Apple"
}
</code>.
     *
     * @param array $attributes the attributes
     *
     * @return self
     */
    public function setAttributes(array $attributes)
    {
        $this->attributes = $attributes;

        return $this;
    }

    /**
     * Gets the List of available attributes' groups
An attribute group is key/value the describes the product specifics
example:
<code>
<?php
{
"name": "lens_system",
"label": "Lens System",
"attributes": [{
"label": "Zoom capability",
"value": "4"
}]
}
</code>.
     *
     * @return array
     */
    public function getAttributesGroups()
    {
        return $this->attributesGroups;
    }

    /**
     * Sets the List of available attributes' groups
An attribute group is key/value the describes the product specifics
example:
<code>
<?php
{
"name": "lens_system",
"label": "Lens System",
"attributes": [{
"label": "Zoom capability",
"value": "4"
}]
}
</code>.
     *
     * @param array $attributesGroups the attributes groups
     *
     * @return self
     */
    public function setAttributesGroups(array $attributesGroups)
    {
        $this->attributesGroups = $attributesGroups;

        return $this;
    }

    /**
     * Gets the List of available variations.
     *
     * @return array
     */
    public function getVariations()
    {
        return $this->variations;
    }

    /**
     * Sets the List of available variations.
     *
     * @param array $variations the variations
     *
     * @return self
     */
    public function setVariations(array $variations)
    {
        $this->variations = $variations;

        return $this;
    }
}
