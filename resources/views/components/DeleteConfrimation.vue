<!-- resources/views/components/DeleteConfirmation.vue -->

<template>
  <div v-if="isVisible" class="fixed inset-0 flex items-center justify-center">
    <div class="bg-white p-6 rounded shadow-md">
      <p>Apakah Anda yakin ingin menghapus produk ini?</p>
      <div class="mt-4 flex justify-between">
        <button @click="confirmDelete" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Ya</button>
        <button @click="cancelDelete" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Tidak</button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      isVisible: false,
    };
  },
  methods: {
    confirmDelete() {
      this.$emit('deleteConfirmed');
      this.isVisible = false;
    },
    cancelDelete() {
      this.$emit('deleteCancelled');
      this.isVisible = false;
    },
  },
};
</script>

<style scoped>
/* Style komponen di sini jika diperlukan */
</style>
