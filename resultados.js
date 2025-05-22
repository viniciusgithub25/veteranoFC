 window.si = window.si || function () { (window.siq = window.siq || []).push(arguments); };
        
        // Script para o acordeão da página de resultados
        document.addEventListener('DOMContentLoaded', function() {
            // Configuração inicial - todas as seções de mês começam fechadas
            const monthHeaders = document.querySelectorAll('.month-header');
            const monthContents = document.querySelectorAll('.month-content');
            
            // Adicionar evento de clique em cada cabeçalho de mês
            monthHeaders.forEach(function(header, index) {
                header.addEventListener('click', function() {
                    // Toggle da classe active no cabeçalho
                    this.classList.toggle('active');
                    
                    // Toggle da exibição do conteúdo correspondente
                    const content = this.nextElementSibling;
                    if (content.classList.contains('active')) {
                        content.classList.remove('active');
                        content.style.maxHeight = null;
                    } else {
                        content.classList.add('active');
                        content.style.maxHeight = content.scrollHeight + 'px';
                    }
                });
            });
            
            // Configuração para o cabeçalho principal
            const accordionHeader = document.querySelector('.accordion-header');
            if (accordionHeader) {
                accordionHeader.addEventListener('click', function() {
                    // Toggle all month sections
                    const allMonthContents = document.querySelectorAll('.accordion-item');
                    const isExpanding = !this.classList.contains('active');
                    
                    this.classList.toggle('active');
                    
                    allMonthContents.forEach(function(item) {
                        if (isExpanding) {
                            item.style.display = 'block';
                        } else {
                            item.style.display = 'none';
                        }
                    });
                });
            }
            
            // Inicialmente esconda todos os itens do acordeão
            document.querySelectorAll('.accordion-item').forEach(function(item) {
                item.style.display = 'none';
            });
        });