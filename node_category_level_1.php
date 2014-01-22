<xen:require css="node_list.css" />
<xen:require css="node_category.css" />
    <li class="node category level_{$level} node_{$category.node_id} <xen:if is="in_array({$category.node_id}, array(94,95,96,97,98,99))">col-md-6</xen:if>" id="{xen:helper linktitle, $category.node_id, $category.title, 1}">
        <a href="{xen:link categories, $category}">
                    <div class="nodeInfo categoryNodeInfo categoryStrip">

                            <div class="categoryText">
                                    <h3 class="nodeTitle">{$category.title}</h3>
                                    <xen:if is="{$category.description}"><blockquote class="nodeDescription baseHtml">{xen:raw $category.description}</blockquote></xen:if>
                            </div>

                    </div>

            <xen:comment>
                    <xen:if is="{$renderedChildren}">		
                            <ol class="nodeList">
                                    <xen:foreach loop="$renderedChildren" value="$child">{xen:raw $child}</xen:foreach>
                            </ol>
                    </xen:if>
            </xen:comment>

                    <span class="tlc"></span>
                    <span class="trc"></span>
                    <span class="blc"></span>
                    <span class="brc"></span>
        </a>
    </li>