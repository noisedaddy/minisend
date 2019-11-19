export default {
  computed: {
    queriedData() {
      return this.users.slice(this.from, this.to);
    },
    to() {
      let highBound = this.from + this.pagination.perPage;
      if (this.total < highBound) {
        highBound = this.total;
      }
      return highBound;
    },
    from() {
      return this.pagination.perPage * (this.pagination.currentPage - 1);
    },
    total() {
      return this.users.length;
    }
  },
  data() {
    return {
      pagination: {
        perPage: 10,
        currentPage: 1,
        perPageOptions: [5, 10, 25, 50],
        total: 0
      },
      searchQuery: '',
    }
  },
  methods: {
    sortChange({ prop, order }) {
      if (prop) {
        this.users.sort((a, b) => {
          let aVal = a[prop]
          let bVal = b[prop]
          if (order === 'ascending') {
            return aVal > bVal ? 1 : -1
          }
          return bVal - aVal ? 1 : -1
        })
      } else {
        this.users.sort((a, b) => {
          return a.id - b.id
        })
      }
    }
  },
}
