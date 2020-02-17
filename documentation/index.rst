Jane: Tools for generating PHP Code
===================================

Jane is a set of libraries to generate Models & API Clients based on JsonSchema / OpenAPI specs
by following high quality PHP code guidelines and respecting common & advanced PSR.

If you don't know what JSON Schema or OpenAPI are, you should consider reading :doc:`/documentation/choose` to help you
sort what you need and how to use them.

If you are a more advanced user you can directly read one of the following detailled getting started to use Jane:

 * :doc:`/documentation/JsonSchema`
 * :doc:`/documentation/OpenAPI`

Lastly, if you want to contribute there is some details about :doc:`/contributing/how`, :doc:`/contributing/bc` and
:doc:`/contributing/tests`

.. toctree::
   :hidden:

   Jane <self>

.. toctree::
   :hidden:
   :caption: Documentation

   Choose the component you need <documentation/choose>
   JSON Schema <documentation/JsonSchema>
   OpenAPI <documentation/OpenAPI>

.. toctree::
   :hidden:
   :caption: Guides

   Elasticsearch models <guides/elasticsearch>
   API Platform DTO <guides/apip_dto>
   External API Client <guides/external_client>
   Between two Symfony apps <guides/two_symfony_apps>

.. toctree::
   :hidden:
   :caption: Contributing

   Backwards compatibility <contributing/bc>
   How it works <contributing/how>
   Tests <contributing/tests>

.. toctree::
   :hidden:
   :caption: Json Schema

   Introduction <JsonSchema/introduction>
   Generating a Model <JsonSchema/generate>
   Using a generated Model <JsonSchema/usage>
   Multi schemas <JsonSchema/multi>

.. toctree::
   :hidden:
   :caption: OpenAPI

   Introduction <OpenAPI/introduction>
   Generating a Client <OpenAPI/generate>
   Using a generated client <OpenAPI/usage>
   Example <OpenAPI/example.rst>
   Extending the Client <OpenAPI/extending>

.. toctree::
   :hidden:
   :caption: AutoMapper

   Introduction <AutoMapper/introduction>
   Usage <AutoMapper/usage>
   Features <AutoMapper/features>
