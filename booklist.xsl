<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
  <xsl:template match="/">
  <html>
  <body>
  <h2>List of Books - Basanta </h2>
  <table boder="1">
  <tr>
  <th>ID</th>
  <th>Title</th>
  <th>Author</th>
  <th>ISBN</th>
  <th>Publisher</th>
  <th>Price</th>
  </tr>
  <xsl:for-each select="booklist/book">
  <tr>
  <th><xsl:value-of select="@id"/></th>
   <th><xsl:value-of select="title"/></th>
    <th><xsl:value-of select="author"/></th>
     <th><xsl:value-of select="isbn"/></th>
      <th><xsl:value-of select="publisher"/></th>
       <th><xsl:value-of select="price"/></th>
     
  </tr>
  </xsl:for-each>
  </table>
  </body>
  </html>
  </xsl:template>
</xsl:stylesheet>
