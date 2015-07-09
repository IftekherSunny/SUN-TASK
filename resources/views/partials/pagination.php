<nav class="text-center paginaton-top" v-if="totalPage > 1">
    <ul class="pagination">
        <li  v-class="disabled: (currentPage == 1)">
            <a href="#" v-on="click: page(currentPage - 1)" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>

        <li v-class="active: currentPage == ($index+1) " v-repeat="totalPage"><a href="#"  v-on="click: page($index + 1)" >{{  $index + 1 }}</a></li>

        <li v-class="disabled: (currentPage == totalPage)">
            <a href="#" v-on="click: page(currentPage + 1)" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
</nav>