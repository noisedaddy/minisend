<template>
  <ul class="pagination" :class="[size && `pagination-${size}`, align && `justify-content-${align}`]">
    <li class="page-item prev-page" :class="{disabled: pagination.current_page <= 1}">
      <a class="page-link" aria-label="Previous" @click="changePage(1)">
        <span aria-hidden="true"><i class="fa fa-angle-double-left" aria-hidden="true"></i></span>
      </a>
    </li>
    <li class="page-item prev-page" :class="{disabled: pagination.current_page <= 1}">
      <a class="page-link" aria-label="Previous" @click="changePage(pagination.current_page - 1)">
        <span aria-hidden="true"><i class="fa fa-angle-left" aria-hidden="true"></i></span>
      </a>
    </li>
    <li class="page-item" v-for="page in pages" :key="page" :class="{active: pagination.current_page === page}">
        <a class="page-link" @click.prevent="changePage(page)">{{ page }}</a>
    </li>
    <li class="page-item next-page" :class="{disabled: pagination.current_page >= pagination.last_page}">
      <a class="page-link" aria-label="Next" @click="changePage(pagination.current_page + 1)">
        <span aria-hidden="true"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
      </a>
    </li>
    <li class="page-item next-page" :class="{disabled: pagination.current_page >= pagination.last_page}">
      <a class="page-link" aria-label="Next" @click="changePage(pagination.last_page)">
        <span aria-hidden="true"><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
      </a>
    </li>
  </ul>
</template>
<script>
export default {
    name: 'base-server-side-pagination',
    props: {
        size: {
            type: String,
            default: '',
            description: 'Pagination size',
        },
        align: {
            type: String,
            default: '',
            description: 'Pagination alignment (e.g center|start|end)',
        },
        pagination: {
            type: Object,
            description: ''
        },
        offset: {
            type: Number,
            description: '',
        }
    },
    computed: {
        pages() {
            let pages = [];
            let from = this.pagination.current_page - Math.floor(this.offset / 2);
            if (from < 1) {
                from = 1;
            }
            let to = from + this.offset - 1;
            if (to > this.pagination.last_page) {
                to = this.pagination.last_page;
            }
            while (from <= to) {
                pages.push(from);
                from++;
            }
            return pages;
        }
    },
    methods: {
        isCurrentPage(page) {
            return this.pagination.current_page === page;
        },
        changePage(page) {
            if (page > this.pagination.last_page) {
                page = this.pagination.last_page;
            }
            this.pagination.current_page = page;
            this.$emit('paginate');
        }
    },
}
</script>