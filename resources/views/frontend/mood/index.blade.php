<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mood Painting</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@400;500;600&display=swap');

        body {
            font-family: 'Inter', system-ui, sans-serif;
        }

        .title {
            font-family: 'Playfair Display', serif;
        }

        canvas {
            border-radius: 16px;
            box-shadow: 0 25px 50px -12px rgb(0 0 0 / 0.4);
            touch-action: none;
        }

        .mood-btn {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .mood-btn:hover {
            transform: scale(1.08) translateY(-2px);
        }

        .mood-btn.active {
            box-shadow: 0 0 0 4px rgba(255, 255, 255, 0.3);
            transform: scale(1.05);
        }

        .color-swatch {
            width: 42px;
            height: 42px;
            border-radius: 9999px;
            cursor: pointer;
            transition: all 0.2s;
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
        }

        .color-swatch:hover {
            transform: scale(1.15);
        }

        .color-swatch.active {
            box-shadow: 0 0 0 4px white, 0 0 0 6px #000;
        }

        .tool-btn {
            transition: all 0.2s;
        }

        .tool-btn.active {
            background-color: #18181b;
            color: white;
        }

        .brush-preview {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: #000;
            box-shadow: inset 0 0 0 2px white;
        }
    </style>
</head>
<body class="bg-zinc-950 text-white min-h-screen">
    <div class="max-w-7xl mx-auto">
        <!-- Header -->
        <header class="flex items-center justify-between px-8 py-6 border-b border-zinc-800">
            <div class="flex items-center gap-x-4">
                <div class="w-10 h-10 bg-gradient-to-br from-violet-500 to-fuchsia-500 rounded-2xl flex items-center justify-center">
                    <span class="text-2xl">🎨</span>
                </div>
                <div>
                    <h1 class="title text-4xl font-bold tracking-tight">Mood Painting</h1>
                    <p class="text-zinc-400 text-sm">Paint how you feel</p>
                </div>
            </div>

            <div class="flex items-center gap-x-6">
                <button onclick="undo()"
                        class="flex items-center gap-x-2 px-5 py-2.5 bg-zinc-900 hover:bg-zinc-800 rounded-2xl text-sm font-medium transition-colors">
                    <i class="fas fa-undo"></i>
                    <span>Undo</span>
                </button>

                <button onclick="clearCanvas()"
                        class="flex items-center gap-x-2 px-5 py-2.5 bg-zinc-900 hover:bg-zinc-800 rounded-2xl text-sm font-medium transition-colors">
                    <i class="fas fa-trash"></i>
                    <span>Clear</span>
                </button>

                <button onclick="saveImage()"
                        class="flex items-center gap-x-3 bg-white text-black px-8 py-3 rounded-3xl font-semibold hover:scale-105 transition-all active:scale-95">
                    <i class="fas fa-download"></i>
                    <span>Save Painting</span>
                </button>
            </div>
        </header>

        <div class="flex h-[calc(100vh-88px)]">
            <!-- Left Sidebar - Moods -->
            <div class="w-72 bg-zinc-900 border-r border-zinc-800 p-6 flex flex-col">
                <h2 class="text-lg font-semibold mb-6 flex items-center gap-x-2">
                    <span class="text-amber-400">🌈</span>
                    Choose Your Mood
                </h2>

                <div id="mood-container" class="grid grid-cols-2 gap-3">
                    <!-- Moods populated by JS -->
                </div>

                <div class="mt-auto pt-8">
                    <div class="bg-zinc-800/50 rounded-3xl p-6">
                        <p class="text-xs text-zinc-400 uppercase tracking-widest mb-2">Current Vibe</p>
                        <div id="current-mood"
                             class="text-3xl font-semibold title flex items-center gap-x-3">
                            <!-- JS updated -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- Canvas Area -->
            <div class="flex-1 flex items-center justify-center bg-zinc-950 relative">
                <div class="relative">
                    <!-- Canvas -->
                    <canvas id="canvas" width="820" height="580"
                            class="bg-white cursor-crosshair"></canvas>

                    <!-- Canvas overlay info -->
                    <div class="absolute -top-3 -right-3 bg-zinc-900 text-xs px-4 py-2 rounded-2xl flex items-center gap-x-2 shadow-xl border border-zinc-700">
                        <div id="brush-info" class="flex items-center gap-x-2 text-zinc-400">
                            <div class="brush-preview" id="brush-preview"></div>
                            <span id="size-value" class="font-mono">12</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Sidebar - Tools -->
            <div class="w-80 bg-zinc-900 border-l border-zinc-800 p-6 flex flex-col">
                <h2 class="text-lg font-semibold mb-6">Tools</h2>

                <!-- Color Palette -->
                <div class="mb-8">
                    <p class="text-xs uppercase tracking-widest text-zinc-400 mb-3">Palette</p>
                    <div id="color-palette" class="grid grid-cols-6 gap-3">
                        <!-- Colors populated by JS -->
                    </div>
                </div>

                <!-- Custom Color -->
                <div class="mb-8">
                    <p class="text-xs uppercase tracking-widest text-zinc-400 mb-3">Custom</p>
                    <div class="flex items-center gap-x-4 bg-zinc-800 rounded-2xl p-4">
                        <input type="color" id="custom-color"
                               value="#000000"
                               class="w-12 h-12 bg-transparent border-0 p-0 cursor-pointer rounded-xl overflow-hidden">
                        <div>
                            <p class="text-sm font-medium">Pick any color</p>
                            <p id="current-hex" class="font-mono text-xs text-zinc-400">#000000</p>
                        </div>
                    </div>
                </div>

                <!-- Brush Size -->
                <div class="mb-8">
                    <div class="flex justify-between items-center mb-3">
                        <p class="text-xs uppercase tracking-widest text-zinc-400">Brush Size</p>
                        <span id="size-display" class="font-mono text-xl font-semibold text-amber-400">12</span>
                    </div>
                    <input type="range" id="brush-size"
                           min="2" max="60" value="12"
                           class="w-full accent-amber-400">
                </div>

                <!-- Tool Buttons -->
                <div class="grid grid-cols-2 gap-3">
                    <button onclick="setTool('pencil')" id="pencil-btn"
                            class="tool-btn active flex flex-col items-center justify-center py-6 bg-zinc-800 hover:bg-zinc-700 rounded-3xl">
                        <i class="fas fa-pencil-alt text-3xl mb-2"></i>
                        <span class="text-sm font-medium">Pencil</span>
                    </button>

                    <button onclick="setTool('eraser')" id="eraser-btn"
                            class="tool-btn flex flex-col items-center justify-center py-6 bg-zinc-800 hover:bg-zinc-700 rounded-3xl">
                        <i class="fas fa-eraser text-3xl mb-2"></i>
                        <span class="text-sm font-medium">Eraser</span>
                    </button>
                </div>

                <div class="mt-auto">
                    <div onclick="randomMood()"
                         class="flex items-center justify-center gap-x-3 border border-dashed border-zinc-700 hover:border-zinc-500 transition-colors rounded-3xl py-8 cursor-pointer">
                        <i class="fas fa-dice text-2xl text-zinc-400"></i>
                        <div>
                            <p class="font-medium">I'm feeling random</p>
                            <p class="text-xs text-zinc-500">Surprise me with a mood</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Tailwind script already included via CDN

        const canvas = document.getElementById('canvas')
        const ctx = canvas.getContext('2d')

        let isDrawing = false
        let lastX = 0
        let lastY = 0
        let currentColor = '#111111'
        let brushSize = 12
        let isEraser = false
        let history = []

        // Moods with emoji + colors
        const moods = [
            {
                name: "Happy",
                emoji: "😊",
                color: "#fbbf24",
                palette: ["#fbbf24", "#f97316", "#ec4899", "#a3e635", "#67e8f9"]
            },
            {
                name: "Calm",
                emoji: "🌊",
                color: "#22d3ee",
                palette: ["#22d3ee", "#67e8f9", "#a5f3fc", "#c4d0ff", "#e0f2fe"]
            },
            {
                name: "Dreamy",
                emoji: "🌙",
                color: "#c026d3",
                palette: ["#c026d3", "#d946ef", "#e879f9", "#f0abfc", "#fae8ff"]
            },
            {
                name: "Fiery",
                emoji: "🔥",
                color: "#ef4444",
                palette: ["#ef4444", "#f97316", "#fbbf24", "#dc2626", "#b91c1c"]
            },
            {
                name: "Mysterious",
                emoji: "🖤",
                color: "#4f46e5",
                palette: ["#4f46e5", "#6366f1", "#818cf8", "#a5b4fc", "#c7d2fe"]
            },
            {
                name: "Fresh",
                emoji: "🌿",
                color: "#10b981",
                palette: ["#10b981", "#34d399", "#6ee7b7", "#a7f3d0", "#d1fae5"]
            }
        ]

        let currentMoodIndex = 0

        // Save current canvas state to history
        function saveToHistory() {
            history.push(ctx.getImageData(0, 0, canvas.width, canvas.height))
            if (history.length > 25) history.shift()
        }

        // Initialize canvas
        function initCanvas() {
            ctx.fillStyle = '#ffffff'
            ctx.fillRect(0, 0, canvas.width, canvas.height)
            saveToHistory()
        }

        // Get mouse/touch position relative to canvas
        function getCoordinates(e) {
            const rect = canvas.getBoundingClientRect()
            let clientX, clientY

            if (e.touches) {
                clientX = e.touches[0].clientX
                clientY = e.touches[0].clientY
            } else {
                clientX = e.clientX
                clientY = e.clientY
            }

            return {
                x: clientX - rect.left,
                y: clientY - rect.top
            }
        }

        // Start drawing
        function startDrawing(e) {
            isDrawing = true
            const coords = getCoordinates(e)
            lastX = coords.x
            lastY = coords.y

            // For single click dots
            ctx.beginPath()
            ctx.fillStyle = isEraser ? '#ffffff' : currentColor
            ctx.arc(lastX, lastY, brushSize / 2, 0, Math.PI * 2)
            ctx.fill()
        }

        // Draw
        function draw(e) {
            if (!isDrawing) return

            const coords = getCoordinates(e)

            ctx.lineWidth = brushSize
            ctx.lineCap = 'round'
            ctx.lineJoin = 'round'

            if (isEraser) {
                ctx.globalCompositeOperation = 'destination-out'
            } else {
                ctx.globalCompositeOperation = 'source-over'
                ctx.strokeStyle = currentColor
            }

            ctx.beginPath()
            ctx.moveTo(lastX, lastY)
            ctx.lineTo(coords.x, coords.y)
            ctx.stroke()

            lastX = coords.x
            lastY = coords.y
        }

        // Stop drawing
        function stopDrawing() {
            if (isDrawing) {
                isDrawing = false
                ctx.globalCompositeOperation = 'source-over'
                saveToHistory()
            }
        }

        // Set current color
        function setColor(color) {
            currentColor = color
            isEraser = false
            updateActiveTool()
            updateBrushPreview()
        }

        // Update brush preview
        function updateBrushPreview() {
            const preview = document.getElementById('brush-preview')
            preview.style.background = currentColor
            preview.style.width = `${Math.min(brushSize * 1.6, 48)}px`
            preview.style.height = `${Math.min(brushSize * 1.6, 48)}px`
        }

        // Render mood buttons
        function renderMoods() {
            const container = document.getElementById('mood-container')
            container.innerHTML = ''

            moods.forEach((mood, index) => {
                const btn = document.createElement('button')
                btn.className = `mood-btn col-span-1 flex flex-col items-center justify-center py-5 rounded-3xl text-center transition-all ${index === currentMoodIndex ? 'active bg-zinc-800' : 'bg-zinc-950 hover:bg-zinc-900'}`
                btn.innerHTML = `
                    <div class="text-4xl mb-2">${mood.emoji}</div>
                    <div class="font-medium text-sm">${mood.name}</div>
                `
                btn.onclick = () => {
                    currentMoodIndex = index
                    renderMoods()
                    applyMood(mood)
                }
                container.appendChild(btn)
            })
        }

        // Apply selected mood
        function applyMood(mood) {
            // Update header mood
            document.getElementById('current-mood').innerHTML = `
                ${mood.emoji} <span style="color: ${mood.color}">${mood.name}</span>
            `
            // Change palette
            renderPalette(mood.palette)

            // Pick first color of mood
            setColor(mood.palette[0])
        }

        // Render color palette
        function renderPalette(palette) {
            const container = document.getElementById('color-palette')
            container.innerHTML = ''

            palette.forEach(color => {
                const swatch = document.createElement('div')
                swatch.className = 'color-swatch'
                swatch.style.backgroundColor = color
                swatch.onclick = () => {
                    setColor(color)
                    renderPalette(palette) // re-render to show active
                }

                // Active check
                if (color === currentColor) {
                    swatch.classList.add('active')
                }

                container.appendChild(swatch)
            })
        }

        // Set tool (pencil or eraser)
        function setTool(tool) {
            if (tool === 'eraser') {
                isEraser = true
            } else {
                isEraser = false
            }
            updateActiveTool()
        }

        function updateActiveTool() {
            document.getElementById('pencil-btn').classList.toggle('active', !isEraser)
            document.getElementById('eraser-btn').classList.toggle('active', isEraser)
        }

        // Clear canvas
        function clearCanvas() {
            ctx.fillStyle = '#ffffff'
            ctx.fillRect(0, 0, canvas.width, canvas.height)
            history = []
            saveToHistory()
        }

        // Undo last stroke
        function undo() {
            if (history.length <= 1) return

            history.pop() // remove current
            const previousState = history[history.length - 1]
            ctx.putImageData(previousState, 0, 0)
        }

        // Save image
        function saveImage() {
            const link = document.createElement('a')
            link.download = `mood-painting-${new Date().toISOString().slice(0,10)}.png`
            link.href = canvas.toDataURL('image/png')
            link.click()

            // Little celebration
            const notif = document.createElement('div')
            notif.style.position = 'fixed'
            notif.style.bottom = '40px'
            notif.style.left = '50%'
            notif.style.transform = 'translateX(-50%)'
            notif.style.background = '#22c55e'
            notif.style.color = 'black'
            notif.style.padding = '14px 28px'
            notif.style.borderRadius = '9999px'
            notif.style.fontWeight = '600'
            notif.style.boxShadow = '0 10px 15px -3px rgb(0 0 0 / 0.3)'
            notif.style.display = 'flex'
            notif.style.alignItems = 'center'
            notif.style.gap = '12px'
            notif.innerHTML = `🎉 Saved! <span class="text-xs opacity-75">Check your downloads</span>`
            document.body.appendChild(notif)

            setTimeout(() => {
                notif.style.transition = 'all 0.4s'
                notif.style.opacity = '0'
                setTimeout(() => notif.remove(), 400)
            }, 2200)
        }

        // Random mood
        function randomMood() {
            const randomIndex = Math.floor(Math.random() * moods.length)
            currentMoodIndex = randomIndex
            renderMoods()
            applyMood(moods[randomIndex])
        }

        // Event listeners for canvas
        function setupCanvasEvents() {
            canvas.addEventListener('mousedown', startDrawing)
            canvas.addEventListener('mousemove', draw)
            canvas.addEventListener('mouseup', stopDrawing)
            canvas.addEventListener('mouseout', stopDrawing)

            // Touch support
            canvas.addEventListener('touchstart', (e) => {
                e.preventDefault()
                startDrawing(e)
            })
            canvas.addEventListener('touchmove', (e) => {
                e.preventDefault()
                draw(e)
            })
            canvas.addEventListener('touchend', (e) => {
                e.preventDefault()
                stopDrawing()
            })
        }

        // Brush size slider
        function setupBrushSlider() {
            const slider = document.getElementById('brush-size')
            const display = document.getElementById('size-display')

            slider.addEventListener('input', () => {
                brushSize = parseInt(slider.value)
                display.textContent = brushSize
                updateBrushPreview()
            })
        }

        // Custom color picker
        function setupColorPicker() {
            const picker = document.getElementById('custom-color')
            const hexDisplay = document.getElementById('current-hex')

            picker.addEventListener('input', () => {
                currentColor = picker.value
                hexDisplay.textContent = currentColor.toUpperCase()
                isEraser = false
                updateActiveTool()
                updateBrushPreview()
            })
        }

        // Keyboard shortcuts
        function setupKeyboard() {
            document.addEventListener('keydown', (e) => {
                if (e.key === 'z' && (e.ctrlKey || e.metaKey)) {
                    e.preventDefault()
                    undo()
                }

                if (e.key === 'Delete' || e.key === 'Backspace') {
                    clearCanvas()
                }

                if (e.key === 's' && (e.ctrlKey || e.metaKey)) {
                    e.preventDefault()
                    saveImage()
                }
            })
        }

        // Initialize everything
        function initialize() {
            // Tailwind already loaded

            initCanvas()
            setupCanvasEvents()
            setupBrushSlider()
            setupColorPicker()
            setupKeyboard()

            // Render moods
            renderMoods()

            // Load first mood
            applyMood(moods[0])

            // Set initial brush preview
            updateBrushPreview()

            // Show welcome toast
            setTimeout(() => {
                const toast = document.createElement('div')
                toast.style.position = 'fixed'
                toast.style.top = '24px'
                toast.style.right = '24px'
                toast.style.backgroundColor = '#18181b'
                toast.style.border = '1px solid #3f3f46'
                toast.style.padding = '16px 24px'
                toast.style.borderRadius = '16px'
                toast.style.boxShadow = '0 10px 15px -3px rgb(0 0 0 / 0.3)'
                toast.style.display = 'flex'
                toast.style.alignItems = 'center'
                toast.style.gap = '12px'
                toast.innerHTML = `
                    <span class="text-2xl">👋</span>
                    <div>
                        <p class="font-semibold">Welcome to Mood Painting</p>
                        <p class="text-xs text-zinc-400">Pick a mood and start creating</p>
                    </div>
                `
                document.body.appendChild(toast)

                setTimeout(() => {
                    toast.style.transition = 'opacity 0.6s'
                    toast.style.opacity = '0'
                    setTimeout(() => toast.remove(), 600)
                }, 3400)
            }, 800)
        }

        // Boot the app
        window.onload = initialize
    </script>
</body>
</html>
