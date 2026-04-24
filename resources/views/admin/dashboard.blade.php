@extends('admin.layout')

@section('title', 'Dashboard Admin - PPID BBIA')
@section('page-title', 'Dashboard')

@section('content')
    <!-- Dashboard Stats -->
    <div class="dashboard-stats">
        <div class="stat-card berita-card">
            <div class="stat-icon">
                <i class="fas fa-newspaper"></i>
            </div>
            <div class="stat-content">
                <h3>Total Berita</h3>
                <div class="number">{{ App\Models\Berita::count() }}</div>
                <div class="stat-detail">
                    <span class="published">{{ App\Models\Berita::where('status', 'published')->count() }} Dipublikasikan</span>
                    <span class="draft">{{ App\Models\Berita::where('status', 'draft')->count() }} Draft</span>
                </div>
            </div>
        </div>
        <div class="stat-card permohonan-card">
            <div class="stat-icon">
                <i class="fas fa-file-alt"></i>
            </div>
            <div class="stat-content">
                <h3>Permohonan</h3>
                <div class="number">{{ App\Models\Permohonan::count() }}</div>
                <div class="stat-detail">
                    <span class="baru">{{ App\Models\Permohonan::where('status', 'baru')->count() }} Baru</span>
                    <span class="proses">{{ App\Models\Permohonan::where('status', 'diproses')->count() }} Diproses</span>
                </div>
            </div>
        </div>
        <div class="stat-card keberatan-card">
            <div class="stat-icon">
                <i class="fas fa-exclamation-triangle"></i>
            </div>
            <div class="stat-content">
                <h3>Keberatan</h3>
                <div class="number">{{ App\Models\Keberatan::count() }}</div>
                <div class="stat-detail">
                    <span class="baru">{{ App\Models\Keberatan::where('status', 'baru')->count() }} Baru</span>
                    <span class="proses">{{ App\Models\Keberatan::where('status', 'diproses')->count() }} Diproses</span>
                </div>
            </div>
        </div>
        <div class="stat-card foto-card">
            <div class="stat-icon">
                <i class="fas fa-camera"></i>
            </div>
            <div class="stat-content">
                <h3>Total Foto</h3>
                <div class="number">{{ App\Models\GaleriFoto::count() }}</div>
                <div class="stat-detail">
                    <span class="foto-aktif">{{ App\Models\GaleriFoto::where('is_active', true)->count() }} Aktif</span>
                    <span class="foto-tidak-aktif">{{ App\Models\GaleriFoto::where('is_active', false)->count() }} Tidak Aktif</span>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Recent Activity -->
    <div class="recent-activity">
        <div class="section-header">
            <h2><i class="fas fa-clock"></i> Aktivitas Terkini</h2>
        </div>
        <ul class="activity-list" id="activity-list">
            <!-- Activities will be loaded dynamically -->
            <li class="loading-activity">
                <div class="activity-item">
                    <div class="activity-icon info-icon">
                        <i class="fas fa-spinner fa-spin"></i>
                    </div>
                    <div class="activity-content">
                        <span class="activity-title">Memuat aktivitas terkini...</span>
                        <span class="activity-date">Sekarang</span>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    
    <!-- Quick Actions -->
    <div class="quick-actions">
        <div class="section-header">
            <h2><i class="fas fa-bolt"></i> Aksi Cepat</h2>
        </div>
        <div class="action-grid">
            <a href="{{ route('admin.berita.create') }}" class="action-card primary-action">
                <div class="action-icon">
                    <i class="fas fa-plus"></i>
                </div>
                <div class="action-content">
                    <h4>Tambah Berita</h4>
                    <p>Buat berita baru</p>
                </div>
            </a>
            <a href="{{ route('admin.permohonan') }}" class="action-card info-action">
                <div class="action-icon">
                    <i class="fas fa-eye"></i>
                </div>
                <div class="action-content">
                    <h4>Lihat Permohonan</h4>
                    <p>Kelola permohonan</p>
                </div>
            </a>
            <a href="{{ route('admin.keberatan') }}" class="action-card warning-action">
                <div class="action-icon">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <div class="action-content">
                    <h4>Lihat Keberatan</h4>
                    <p>Kelola keberatan</p>
                </div>
            </a>
            <a href="{{ route('admin.laporan-tahunan-ppid.create') }}" class="action-card success-action">
                <div class="action-icon">
                    <i class="fas fa-upload"></i>
                </div>
                <div class="action-content">
                    <h4>Upload Laporan</h4>
                    <p>Tambah laporan baru</p>
                </div>
            </a>
        </div>
    </div>
    
    <style>
    /* Dashboard Stats */
    .dashboard-stats {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 1.5rem;
        margin-bottom: 2rem;
    }
    
    .stat-card {
        background: linear-gradient(135deg, #0f2338 0%, #2c5282 35%, #1a3a5f 100%);
        border-radius: 12px;
        padding: 1rem;
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        border-left: 3px solid transparent;
        display: flex;
        align-items: center;
        gap: 0.75rem;
        color: white;
    }
    
    .stat-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
    }
    
    .berita-card { border-left-color: #28a745; }
    .permohonan-card { border-left-color: #007bff; }
    .keberatan-card { border-left-color: #ffc107; }
    .foto-card { border-left-color: #17a2b8; }
    
    .stat-icon {
        width: 48px;
        height: 48px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.25rem;
        color: white;
        flex-shrink: 0;
    }
    
    .berita-card .stat-icon { background: linear-gradient(135deg, #28a745, #20c997); }
    .permohonan-card .stat-icon { background: linear-gradient(135deg, #007bff, #0056b3); }
    .keberatan-card .stat-icon { background: linear-gradient(135deg, #ffc107, #e0a800); }
    .foto-card .stat-icon { background: linear-gradient(135deg, #17a2b8, #138496); }
    
    .stat-content {
        flex: 1;
    }
    
    .stat-content h3 {
        margin: 0 0 0.25rem 0;
        color: white;
        font-size: 0.875rem;
        font-weight: 600;
        opacity: 0.9;
    }
    
    .number {
        font-size: 2rem;
        font-weight: 700;
        color: white;
        margin-bottom: 0.5rem;
        line-height: 1;
    }
    
    .stat-detail {
        display: flex;
        gap: 0.25rem;
        flex-wrap: wrap;
    }
    
    .stat-detail span {
        background: rgba(255, 255, 255, 0.2);
        color: white;
        padding: 0.125rem 0.5rem;
        border-radius: 12px;
        font-size: 0.625rem;
        font-weight: 500;
    }
    
    .published { background: rgba(40, 167, 69, 0.3) !important; color: white !important; }
    .draft { background: rgba(255, 193, 7, 0.3) !important; color: white !important; }
    .baru { background: rgba(220, 53, 69, 0.3) !important; color: white !important; }
    .proses { background: rgba(23, 162, 184, 0.3) !important; color: white !important; }
    .foto-aktif { background: rgba(40, 167, 69, 0.3) !important; color: white !important; }
    .foto-tidak-aktif { background: rgba(220, 53, 69, 0.3) !important; color: white !important; }
    
    /* Recent Activity */
    .recent-activity {
        background: white;
        border-radius: 16px;
        padding: 1.5rem;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        margin-bottom: 2rem;
    }
    
    .section-header {
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
        border-bottom: 2px solid #f8f9fa;
    }
    
    .section-header h2 {
        margin: 0;
        color: #2c3e50;
        font-size: 1.25rem;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    .section-header h2 i {
        color: #007bff;
    }
    
        
    .loading-activity {
        opacity: 0.7;
    }
    
    .activity-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    
    .activity-item {
        display: flex;
        align-items: flex-start;
        gap: 1rem;
        padding: 1rem 0;
        border-bottom: 1px solid #f8f9fa;
        transition: all 0.2s ease;
    }
    
    .activity-item:hover {
        background: #f8f9fa;
        margin: 0 -1rem;
        padding: 1rem;
    }
    
    .activity-item:last-child {
        border-bottom: none;
    }
    
    .activity-icon {
        width: 40px;
        height: 40px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        flex-shrink: 0;
        margin-top: 0.25rem;
    }
    
    .permohonan-icon { background: linear-gradient(135deg, #007bff, #0056b3); }
    .berita-icon { background: linear-gradient(135deg, #28a745, #20c997); }
    .keberatan-icon { background: linear-gradient(135deg, #ffc107, #e0a800); }
    .info-icon { background: linear-gradient(135deg, #17a2b8, #138496); }
    
    .activity-content {
        flex: 1;
    }
    
    .activity-title {
        display: block;
        color: #2c3e50;
        font-weight: 500;
        margin-bottom: 0.25rem;
    }
    
    .activity-date {
        color: #6c757d;
        font-size: 0.875rem;
    }
    
    /* Quick Actions */
    .quick-actions {
        background: white;
        border-radius: 16px;
        padding: 1.5rem;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    }
    
    .action-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1rem;
    }
    
    .action-card {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1.25rem;
        border-radius: 12px;
        text-decoration: none;
        transition: all 0.3s ease;
        border: 2px solid transparent;
    }
    
    .action-card:hover {
        transform: translateY(-2px);
        text-decoration: none;
    }
    
    .primary-action {
        background: linear-gradient(135deg, #007bff, #0056b3);
        color: white;
    }
    
    .primary-action:hover {
        background: linear-gradient(135deg, #0056b3, #007bff);
    }
    
    .info-action {
        background: linear-gradient(135deg, #17a2b8, #138496);
        color: white;
    }
    
    .info-action:hover {
        background: linear-gradient(135deg, #138496, #17a2b8);
    }
    
    .warning-action {
        background: linear-gradient(135deg, #ffc107, #e0a800);
        color: white;
    }
    
    .warning-action:hover {
        background: linear-gradient(135deg, #e0a800, #ffc107);
    }
    
    .success-action {
        background: linear-gradient(135deg, #28a745, #20c997);
        color: white;
    }
    
    .success-action:hover {
        background: linear-gradient(135deg, #20c997, #28a745);
    }
    
    .action-icon {
        width: 48px;
        height: 48px;
        border-radius: 10px;
        background: rgba(255, 255, 255, 0.2);
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }
    
    .action-content h4 {
        margin: 0 0 0.25rem 0;
        font-size: 1rem;
        font-weight: 600;
    }
    
    .action-content p {
        margin: 0;
        font-size: 0.875rem;
        opacity: 0.9;
    }
    
    /* Responsive */
    @media (max-width: 1200px) {
        .dashboard-stats {
            grid-template-columns: repeat(2, 1fr);
        }
    }
    
    @media (max-width: 768px) {
        .dashboard-stats {
            grid-template-columns: 1fr;
        }
        
        .stat-card {
            flex-direction: column;
            text-align: center;
            gap: 1rem;
        }
        
        .stat-icon {
            margin: 0 auto;
        }
        
        .action-grid {
            grid-template-columns: 1fr;
        }
        
        .action-card {
            flex-direction: column;
            text-align: center;
        }
        
        .action-icon {
            margin: 0 auto 0.5rem auto;
        }
    }
    </style>
    
    <script>
    // Dashboard Update System
    class Dashboard {
        constructor() {
            this.init();
        }

        init() {
            this.loadInitialData();
        }

        async loadInitialData() {
            try {
                const response = await fetch('/admin/api/realtime-activity');
                const data = await response.json();
                this.updateDashboard(data);
            } catch (error) {
                console.error('Error loading initial data:', error);
            }
        }

        updateDashboard(data) {
            // Update stats
            this.updateStats(data.stats);
            
            // Update activities
            this.updateActivities(data.activities);
        }

        updateStats(stats) {
            // Update berita stats
            this.updateStatCard('.berita-card .number', stats.total_berita);
            this.updateStatDetail('.published', stats.berita_published + ' Dipublikasikan');
            this.updateStatDetail('.draft', stats.berita_draft + ' Draft');

            // Update permohonan stats
            this.updateStatCard('.permohonan-card .number', stats.total_permohonan);
            this.updateStatDetail('.baru', stats.permohonan_baru + ' Baru');
            this.updateStatDetail('.proses', stats.permohonan_diproses + ' Diproses');

            // Update keberatan stats
            this.updateStatCard('.keberatan-card .number', stats.total_keberatan);
            const keberatanBaruElements = document.querySelectorAll('.keberatan-card .baru');
            const keberatanProsesElements = document.querySelectorAll('.keberatan-card .proses');
            if (keberatanBaruElements[0]) keberatanBaruElements[0].textContent = stats.keberatan_baru + ' Baru';
            if (keberatanProsesElements[0]) keberatanProsesElements[0].textContent = stats.keberatan_diproses + ' Diproses';

            // Update foto stats
            this.updateStatCard('.foto-card .number', stats.total_foto);
            this.updateStatDetail('.foto-aktif', stats.foto_aktif + ' Aktif');
            this.updateStatDetail('.foto-tidak-aktif', stats.foto_tidak_aktif + ' Tidak Aktif');
        }

        updateStatCard(selector, value) {
            const element = document.querySelector(selector);
            if (element) {
                const currentValue = parseInt(element.textContent);
                const newValue = parseInt(value);
                
                // Animate number change
                if (currentValue !== newValue) {
                    this.animateNumber(element, currentValue, newValue);
                }
            }
        }

        updateStatDetail(selector, text) {
            const element = document.querySelector(selector);
            if (element) {
                element.textContent = text;
            }
        }

        animateNumber(element, from, to) {
            const duration = 1000;
            const start = Date.now();
            
            const animate = () => {
                const elapsed = Date.now() - start;
                const progress = Math.min(elapsed / duration, 1);
                
                const current = Math.floor(from + (to - from) * this.easeOutQuad(progress));
                element.textContent = current;
                
                if (progress < 1) {
                    requestAnimationFrame(animate);
                }
            };
            
            animate();
        }

        easeOutQuad(t) {
            return t * (2 - t);
        }

        updateActivities(activities) {
            const activityList = document.getElementById('activity-list');
            if (!activityList || !activities) return;

            // Clear existing activities
            activityList.innerHTML = '';

            // Add new activities
            activities.forEach((activity, index) => {
                const activityItem = this.createActivityItem(activity);
                activityList.appendChild(activityItem);
                
                // Add fade-in animation
                setTimeout(() => {
                    activityItem.style.opacity = '1';
                    activityItem.style.transform = 'translateY(0)';
                }, index * 100);
            });
        }

        createActivityItem(activity) {
            const li = document.createElement('li');
            li.style.opacity = '0';
            li.style.transform = 'translateY(20px)';
            li.style.transition = 'all 0.5s ease';
            
            const iconClass = this.getActivityIconClass(activity.type);
            
            li.innerHTML = `
                <div class="activity-item">
                    <div class="activity-icon ${iconClass}">
                        <i class="fas ${activity.icon}"></i>
                    </div>
                    <div class="activity-content">
                        <a href="${activity.url}" class="activity-title">${activity.title}</a>
                        <span class="activity-description">${activity.description}</span>
                        <span class="activity-date">${activity.time}</span>
                    </div>
                </div>
            `;
            
            return li;
        }

        getActivityIconClass(type) {
            const iconClasses = {
                'permohonan': 'permohonan-icon',
                'berita': 'berita-icon',
                'keberatan': 'keberatan-icon',
                'status_update': 'info-icon'
            };
            return iconClasses[type] || 'info-icon';
        }
    }

    // Initialize dashboard when DOM is ready
    document.addEventListener('DOMContentLoaded', function() {
        new Dashboard();
    });

    // Add styles for activity description
    const style = document.createElement('style');
    style.textContent = `
        .activity-description {
            display: block;
            color: #6c757d;
            font-size: 0.8rem;
            margin-bottom: 0.25rem;
        }
        
        .activity-title {
            color: #2c3e50;
            font-weight: 500;
            text-decoration: none;
        }
        
        .activity-title:hover {
            color: #34495e;
            text-decoration: underline;
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
        
        .stat-card.updating {
            animation: pulse 0.3s ease;
        }
    `;
    document.head.appendChild(style);
    </script>
@endsection
