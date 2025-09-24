Write-Host "🧊 Pushing Frozen Gen to GitHub..." -ForegroundColor Cyan
Write-Host "===========================================" -ForegroundColor Yellow

Write-Host "📊 Checking repository status..." -ForegroundColor Yellow
git status --short

$commitInfo = git log -1 --oneline
Write-Host "✅ Ready to push: $commitInfo" -ForegroundColor Green

Write-Host "⬆️ Pushing to GitHub..." -ForegroundColor Yellow
git push -u origin main

if ($LASTEXITCODE -eq 0) {
    Write-Host "" -ForegroundColor Green
    Write-Host "🎉 SUCCESS! Frozen Gen uploaded to GitHub!" -ForegroundColor Green
    Write-Host "🌐 Repository: https://github.com/starkdcc/frozen-gen" -ForegroundColor Green
    Write-Host "" -ForegroundColor Green
    Write-Host "🚂 Next Steps:" -ForegroundColor Yellow
    Write-Host "   1. Visit your GitHub repository to verify files" -ForegroundColor White
    Write-Host "   2. Follow RAILWAY_STEPS.md for deployment" -ForegroundColor White
    Write-Host "   3. Your app will be live in ~5 minutes!" -ForegroundColor White
} else {
    Write-Host "" -ForegroundColor Red
    Write-Host "❌ Push failed. Make sure you created the GitHub repository first" -ForegroundColor Red
    Write-Host "   Go to: https://github.com/new" -ForegroundColor Yellow
    Write-Host "   Repository name: frozen-gen (Public, no README)" -ForegroundColor Yellow
}

Write-Host "Press Enter to close..." -ForegroundColor Gray
Read-Host
