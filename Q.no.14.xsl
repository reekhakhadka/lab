<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
  xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

  <xsl:output method="html" indent="yes"/>

  <xsl:template match="/">

    <html>
      <head>
        <title>Book Catalog</title>
        <style>
          table {
            border-collapse: collapse;
            width: 100%;
          }
          th, td {
            border: 1px solid #999;
            padding: 8px;
            text-align: left;
          }
          th {
            background-color: #f2f2f2;
          }
        </style>
      </head>
      <body>
        <h2>Book Catalog</h2>
        <table>
          <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Publish Date</th>
            <th>Author</th>
            <th>Genre</th>
            <th>Description</th>
            <th>Price</th>
          </tr>

          <!-- Loop through each book -->
          <xsl:for-each select="catalog/book">
            <tr>
              <td><xsl:value-of select="@id"/></td>
              <td><xsl:value-of select="title"/></td>
              <td><xsl:value-of select="publish_date"/></td>
              <td><xsl:value-of select="author"/></td>
              <td><xsl:value-of select="genre"/></td>
              <td><xsl:value-of select="description"/></td>
              <td><xsl:value-of select="price"/></td>
            </tr>
          </xsl:for-each>

        </table>
      </body>
    </html>

  </xsl:template>
</xsl:stylesheet>