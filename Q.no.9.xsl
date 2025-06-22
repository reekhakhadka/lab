<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" 
                xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:output method="html" encoding="UTF-8"/>

    <xsl:template match="/">
        <html>
            <head>
                <title>XML to CSS</title>
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        background-color: #f0f0f8;
                        margin: 20px;
                    }
                    h1 {
                        color: #2c3e50;
                        font-size: 28px;
                        text-align: center;
                        margin-bottom: 30px;
                        background-color: green;
                    }
                    h2 {
                        color: #34495e;
                        margin-top: 20px;
                        text-align: center;
                        color: green;
                    }
                    ul {
                        padding-left: 20px;
                        margin-bottom: 20px;
                        text-align: center;
                    }
                </style>
            </head>
            <body>
                <h1>
                    <xsl:value-of select="content/heading"/>
                </h1>
                <xsl:for-each select="content/section">
                    <h2><xsl:value-of select="@title"/></h2>
                    <ul>
                        <xsl:for-each select="item">
                            <li><xsl:value-of select="."/></li>
                        </xsl:for-each>
                    </ul>
                </xsl:for-each>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>