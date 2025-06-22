<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
                version="1.0">

  <xsl:key name="categoryKey" match="product[quantity &gt;= 10]" use="category"/>

  <xsl:template match="/products">
    <grouped-products>
      <!-- Loop over distinct categories -->
      <xsl:for-each select="product[quantity &gt;= 10][generate-id() = generate-id(key('categoryKey', category)[1])]">
        <category name="{category}">
          <!-- Sort products by price descending -->
          <xsl:for-each select="key('categoryKey', category)">
            <xsl:sort select="price" data-type="number" order="descending"/>
            <product productname="{productname}">
              <price><xsl:value-of select="price"/></price>
              <quantity><xsl:value-of select="quantity"/></quantity>
              <total-price>
                <xsl:value-of select="price * quantity"/>
              </total-price>
            </product>
          </xsl:for-each>
        </category>
      </xsl:for-each>
    </grouped-products>
  </xsl:template>

</xsl:stylesheet>