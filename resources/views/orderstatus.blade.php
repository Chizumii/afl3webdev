<!-- Inside the order card, before the end of the grid div -->
<div class="mt-6 pt-4 border-t">
    <div class="flex justify-end gap-4">
        @if($order['deliveryStatus'] === 'Pending')
            <form action="{{ route('order.delete', $order['id']) }}" method="POST" class="inline delete-order-form">
                @csrf
                @method('DELETE')
                <button type="button" 
                        class="text-red-500 hover:text-red-700 transition-colors delete-order-btn"
                        data-order-id="{{ $order['id'] }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                </button>
            </form>
        @endif
        <button class="text-sm text-[#A07658] hover:text-[#8d642b] transition-colors">
            Track Order
        </button>
        <button class="text-sm text-[#A07658] hover:text-[#8d642b] transition-colors">
            Contact Support
        </button>
    </div>
</div>

<!-- Add this JavaScript at the bottom of your view -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const deleteButtons = document.querySelectorAll('.delete-order-btn');
    
    deleteButtons.forEach(button => {
        button.addEventListener('click', function() {
            const orderId = this.dataset.orderId;
            
            if (confirm('Are you sure you want to delete this order?')) {
                fetch(`/orders/${orderId}`, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Remove the order card from the UI
                        this.closest('.bg-white').remove();
                        
                        // Show success message
                        const notification = document.createElement('div');
                        notification.className = 'fixed bottom-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg';
                        notification.textContent = 'Order deleted successfully!';
                        document.body.appendChild(notification);
                        
                        setTimeout(() => notification.remove(), 3000);
                    } else {
                        throw new Error(data.message);
                    }
                })
                .catch(error => {
                    const notification = document.createElement('div');
                    notification.className = 'fixed bottom-4 right-4 bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg';
                    notification.textContent = 'Error deleting order. Please try again.';
                    document.body.appendChild(notification);
                    
                    setTimeout(() => notification.remove(), 3000);
                });
            }
        });
    });
});
</script>