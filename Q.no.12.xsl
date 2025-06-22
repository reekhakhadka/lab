<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:output method="html" indent="yes"/>
  
  <xsl:template match="/">
    <html>
      <body>
        <table border="1">
          <tr>
            <th>Title</th>
            <th>Year</th>
            <th>Author/Editor</th>
            <th>Publisher</th>
            <th>Price</th>
          </tr>
          <xsl:apply-templates select="bib/book"/>
        </table>
      </body>
    </html>
  </xsl:template>
  
  <xsl:template match="book">
    <tr>
      <td><xsl:value-of select="title"/></td>
      <td><xsl:value-of select="@year"/></td>
      <td>
        <xsl:choose>
          <xsl:when test="author">
            <xsl:for-each select="author">
              <xsl:value-of select="."/>
              <xsl:if test="position() != last()">, </xsl:if>
            </xsl:for-each>
          </xsl:when>
          <xsl:otherwise>
            <xsl:value-of select="editor"/>
          </xsl:otherwise>
        </xsl:choose>
      </td>
      <td><xsl:value-of select="publisher"/></td>
      <td><xsl:value-of select="price"/></td>
    </tr>
  </xsl:template>
</xsl:stylesheet> 